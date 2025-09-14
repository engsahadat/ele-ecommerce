<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SellerProductController extends Controller
{
    public function index(){
        $products = Product::where('seller_id', Auth::id())->with('category', 'subcategory', 'store', 'images')->get();
        return view('seller.product.index', compact('products'));
    }
    public function create(){
        $stores = Store::where('user_id', Auth::id())->get();
        return view('seller.product.create', compact('stores'));
    }

    public function store(Request $request){
        try {
            //validation
            $request->validate([
                'name' => 'required|string|max:100',
                'description' => 'nullable|string',
                'sku' => 'required|string|max:100|unique:products,sku',
                'category_id' => 'required|exists:categories,id',
                'subcategory_id' => 'required|exists:sub_categories,id',
                'store_id' => 'required|exists:stores,id',
                'price' => 'required|numeric|min:0|max:99999999.99',
                'discounted_price' => 'nullable|numeric|min:0|max:99999999.99|lt:price',
                'tax_rate' => 'required|numeric|min:0|max:100',
                'stock' => 'required|integer|min:0',
                'slug' => 'required|string|unique:products,slug',
                'meta_title' => 'nullable|string|max:150',
                'meta_description' => 'nullable|string',
                'product_image' => 'nullable|array',
                'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            
            // Create the product
            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'sku' => $request->sku,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'seller_id' => Auth::id(),
                'store_id' => $request->store_id,
                'price' => $request->price,
                'discounted_price' => $request->discounted_price,
                'tax_rate' => $request->tax_rate ?? 0.00,
                'stock' => $request->stock,
                'stock_status' => $request->stock > 0 ? 'in_stock' : 'out_of_stock',
                'slug' => $request->slug,
                'visibility' => false, // Default to hidden until approved
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'status' => 'draft', // Default status
            ]);

            // Handle product image uploads
            if ($request->hasFile('product_image')) {
                foreach ($request->file('product_image') as $index => $image) {
                    // Generate a unique filename
                    $filename = time() . '_' . $index . '.' . $image->getClientOriginalExtension();
                    $path = $image->storeAs('products', $filename, 'public');

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $path,
                        'is_primary' => $index === 0, // Make first image primary
                    ]);
                }
            }

            return redirect()->route('vendor.product.index')->with('message', 'Product created successfully.');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }

    }
    public function edit($id){
        $product = Product::where('id', $id)->where('seller_id', Auth::id())->with('images')->firstOrFail();
        $stores = Store::where('user_id', Auth::id())->get();
        return view('seller.product.edit', compact('product', 'stores'));
    }
    public function update(Request $request, $id){
        try {
            $product = Product::where('id', $id)->where('seller_id', Auth::id())->firstOrFail();
            
            //validation
            $request->validate([
                'name' => 'required|string|max:100',
                'description' => 'nullable|string',
                'sku' => 'required|string|max:100|unique:products,sku,'.$product->id,
                'category_id' => 'required|exists:categories,id',
                'subcategory_id' => 'required|exists:sub_categories,id',
                'store_id' => 'required|exists:stores,id',
                'price' => 'required|numeric|min:0|max:99999999.99',
                'discounted_price' => 'nullable|numeric|min:0|max:99999999.99|lt:price',
                'tax_rate' => 'required|numeric|min:0|max:100',
                'stock' => 'required|integer|min:0',
                'slug' => 'required|string|unique:products,slug,'.$product->id,
                'meta_title' => 'nullable|string|max:150',
                'meta_description' => 'nullable|string',
                'product_image' => 'nullable|array',
                'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
                'remove_images' => 'nullable|array',
                'remove_images.*' => 'integer|exists:product_images,id',
            ]);
            
            // Update the product
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'sku' => $request->sku,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'store_id' => $request->store_id,
                'price' => $request->price,
                'discounted_price' => $request->discounted_price,
                'tax_rate' => $request->tax_rate ?? 0.00,
                'stock' => $request->stock,
                'stock_status' => $request->stock > 0 ? 'in_stock' : 'out_of_stock',
                'slug' => $request->slug,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
            ]);

            // Handle image removal
            if ($request->has('remove_images')) {
                foreach ($request->remove_images as $imageId) {
                    $image = ProductImage::where('id', $imageId)->where('product_id', $product->id)->first();
                    if ($image) {
                        // Delete image file from storage
                        if (Storage::disk('public')->exists($image->image_path)) {
                            Storage::disk('public')->delete($image->image_path);
                        }
                        $image->delete();
                    }
                }
            }

            // Handle new product image uploads
            if ($request->hasFile('product_image')) {
                // Get current image count to maintain order
                $currentImageCount = $product->images()->count();
                
                foreach ($request->file('product_image') as $index => $image) {
                    // Generate a unique filename
                    $filename = time() . '_' . ($currentImageCount + $index) . '.' . $image->getClientOriginalExtension();
                    $path = $image->storeAs('products', $filename, 'public');

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $path,
                        'is_primary' => $currentImageCount === 0 && $index === 0, // Make first image primary if no images exist
                    ]);
                }
            }

            return redirect()->route('vendor.product.index')->with('message', 'Product updated successfully.');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id){
        try {
            $product = Product::where('id', $id)->where('seller_id', Auth::id())->firstOrFail();
            foreach ($product->images as $image) {
                if (Storage::disk('public')->exists($image->image_path)) {
                    Storage::disk('public')->delete($image->image_path);
                }
                $image->delete();
            }
            $product->delete();
            return redirect()->route('vendor.product.index')->with('message', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    
}
