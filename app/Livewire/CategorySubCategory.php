<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class CategorySubCategory extends Component
{
    public $categories = [];
    public $selectedCategory;
    public $selectedSubCategory;
    public $subCategories = [];

    public function mount($categoryId = null, $subCategoryId = null){
        $this->categories = Category::all();

        if ($categoryId) {
            $this->selectedCategory = $categoryId;
            $this->subCategories = SubCategory::where('category_id', $categoryId)->get();
        }

        if ($subCategoryId) {
            // Ensure subcategory actually belongs to selected category; if no category passed, infer it.
            if (!$categoryId) {
                $found = SubCategory::with('category')->find($subCategoryId);
                if ($found) {
                    $this->selectedCategory = $found->category_id;
                    $this->subCategories = SubCategory::where('category_id', $found->category_id)->get();
                }
            }
            $valid = collect($this->subCategories)->firstWhere('id', $subCategoryId);
            if ($valid) {
                $this->selectedSubCategory = $subCategoryId;
            }
        }
    }
    public function updatedSelectedCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        if ($categoryId) {
            $this->subCategories = SubCategory::where('category_id', $categoryId)->get();
        } else {
            $this->subCategories = [];
        }
        // Only reset subcategory if it's not a valid subcategory for the new category
        if ($this->selectedSubCategory && count($this->subCategories) > 0) {
            $validSubCategory = collect($this->subCategories)->where('id', $this->selectedSubCategory)->first();
            if (!$validSubCategory) {
                $this->selectedSubCategory = null;
            }
        } else {
            $this->selectedSubCategory = null;
        }
    }
    
    public function categoryChanged($categoryId)
    {
        $this->selectedCategory = $categoryId;
        $this->subCategories = SubCategory::where('category_id', $categoryId)->get();
        $this->selectedSubCategory = null; // Reset subcategory when category changes
    }
    public function render()
    {
        return view('livewire.category-sub-category');
    }
}
