<div>
    <div class="mb-3">
        <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
        <select name="category_id" id="category" class="form-select @error('category_id') is-invalid @enderror" wire:model.live="selectedCategory">
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="subcategory" class="form-label">Subcategory <span class="text-danger">*</span></label>
        <select name="subcategory_id" id="subcategory" class="form-select @error('subcategory_id') is-invalid @enderror" wire:model="selectedSubCategory">
            <option value="">Select Subcategory</option>
            @if(count($subCategories) > 0)
                @foreach($subCategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                @endforeach
            @else
                <option value="">Not found any subcategory</option>
            @endif
        </select>
        @error('subcategory_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
