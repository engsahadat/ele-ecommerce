<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = SubCategory::with('category')->get();
        return view('admin.sub-category.index', compact('subcategories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.sub-category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
        ]);
        SubCategory::create($request->all());
        return redirect()->route('subcategory.index')->with('message', 'Subcategory created successfully.');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.sub-category.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
        ]);
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->update($request->all());
        return redirect()->route('subcategory.index')->with('message', 'Subcategory updated successfully.');
    }

    public function destroy($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();
        return redirect()->route('subcategory.index')->with('message', 'Subcategory deleted successfully.');
    }
}
