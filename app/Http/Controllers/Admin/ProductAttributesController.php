<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductAttributes;
use Illuminate\Http\Request;

class ProductAttributesController extends Controller
{
    public function index()
    {
        $productAttributes = ProductAttributes::all();
        return view('admin.product-attribute.index', compact('productAttributes'));
    }
     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product-attribute.create');
    }
    public function store(Request $request)
    {
        // Validate and store the product attribute
        $request->validate([
            'attribute_value' => 'required|string|max:100',
        ]);

        // Store the product attribute in the database
        ProductAttributes::create([
            'attribute_value' => $request->input('attribute_value'),
        ]);

        return redirect()->route('productattributes.index')->with('message', 'Product attribute created successfully.');
    }

    public function edit($id)
    {
        $attribute = ProductAttributes::findOrFail($id);
        return view('admin.product-attribute.edit', compact('attribute'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the product attribute
        $request->validate([
            'attribute_value' => 'required|string|max:255',
        ]);

        $attribute = ProductAttributes::findOrFail($id);
        $attribute->update([
            'attribute_value' => $request->input('attribute_value'),
        ]);

        return redirect()->route('productattributes.index')->with('message', 'Product attribute updated successfully.');
    }

    public function destroy($id)
    {
        $attribute = ProductAttributes::findOrFail($id);
        $attribute->delete();

        return redirect()->route('productattributes.index')->with('message', 'Product attribute deleted successfully.');
    }

}
