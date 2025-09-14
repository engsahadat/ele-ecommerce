@extends('seller.layouts.layout')
@section('seller_title','Edit Product - Seller Panel')
@section('seller_layout')

@php
use Illuminate\Support\Facades\Storage;
@endphp

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10 col-md-12">
            <div class="admin-form-card admin-form-shadow">
                <div class="admin-form-card-header">
                    <h4 class="mb-0 text-white">Edit Product</h4>
                </div>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('vendor.product.update', $product->id) }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="form-label">Product Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="Enter product name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4" placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        @if($product->images && $product->images->count() > 0)
                        <div class="mb-4">
                            <label class="form-label">Current Images</label>
                            <div class="row">
                                @foreach($product->images as $image)
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img src="{{ Storage::url($image->image_path) }}" class="card-img-top" style="height: 150px; object-fit: cover;" alt="Product Image">
                                        <div class="card-body p-2">
                                            @if($image->is_primary)
                                                <small class="badge bg-primary">Primary</small>
                                            @endif
                                            <div class="form-check mt-1">
                                                <input class="form-check-input" type="checkbox" name="remove_images[]" value="{{ $image->id }}" id="remove_{{ $image->id }}">
                                                <label class="form-check-label text-danger" for="remove_{{ $image->id }}">
                                                    Remove
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        
                        <div class="mb-4">
                            <label for="product_image" class="form-label">Add New Images</label>
                            <input multiple type="file" class="form-control @error('product_image') is-invalid @enderror @error('product_image.*') is-invalid @enderror" id="product_image" name="product_image[]" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg">
                            @error('product_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="sku" class="form-label">SKU <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" value="{{ old('sku', $product->sku) }}" placeholder="Enter product SKU">
                            @error('sku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <livewire:category-sub-category 
                            :category-id="old('category_id', $product->category_id)" 
                            :sub-category-id="old('subcategory_id', $product->subcategory_id)" 
                        />
                        <div class="mb-4">
                            <label for="store_id" class="form-label">Store Name <span class="text-danger">*</span></label>
                            <select name="store_id" id="store_id" class="form-select @error('store_id') is-invalid @enderror">
                                <option value="">Select Store</option>
                                @foreach($stores as $store)
                                    <option value="{{ $store->id }}" {{ old('store_id', $product->store_id) == $store->id ? 'selected' : '' }}>
                                        {{ $store->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('store_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="price" class="form-label">Regular Price <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $product->price) }}" placeholder="0.00">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="discounted_price" class="form-label">Discounted Price</label>
                            <input type="number" step="0.01" class="form-control @error('discounted_price') is-invalid @enderror" id="discounted_price" name="discounted_price" value="{{ old('discounted_price', $product->discounted_price) }}" placeholder="0.00">
                            @error('discounted_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="tax_rate" class="form-label">Tax <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" class="form-control @error('tax_rate') is-invalid @enderror" id="tax_rate" name="tax_rate" value="{{ old('tax_rate', $product->tax_rate) }}" placeholder="0.00">
                            @error('tax_rate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="stock" class="form-label">Stock <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" placeholder="0">
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $product->slug) }}" placeholder="slug">
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" name="meta_title" value="{{ old('meta_title', $product->meta_title) }}" placeholder="Meta Title">
                            @error('meta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <input type="text" class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" value="{{ old('meta_description', $product->meta_description) }}" placeholder="Meta Description">
                            @error('meta_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-3">
                            <a href="{{ route('vendor.product.index') }}" class="admin-form-btn btn btn-outline-secondary admin-form-btn-lg">
                                Cancel
                            </a>
                            <button type="submit" class="admin-form-btn btn btn-primary admin-form-btn-lg">
                                Update Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection