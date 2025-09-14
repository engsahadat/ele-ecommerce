@extends('seller.layouts.layout')
@section('seller_title','Edit Store - Seller Panel')
@section('seller_layout')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10 col-md-12">
            <div class="admin-form-card admin-form-shadow">
                <div class="admin-form-card-header">
                    <h4 class="mb-0 text-white">Edit Store</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('vendor.store.update', $store->id) }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="form-label">Store Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $store->name) }}" placeholder="Enter store name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $store->slug) }}" placeholder="Enter store slug">
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="details" class="form-label">Details</label>
                            <textarea class="form-control @error('details') is-invalid @enderror" 
                                      id="details" 
                                      name="details" 
                                      rows="10" 
                                      placeholder="Enter store details">{{ old('details', $store->details) }}</textarea>
                            @error('details')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center pt-3">
                            <a href="{{ route('vendor.store.index') }}" class="admin-form-btn btn btn-outline-secondary admin-form-btn-lg">
                                Cancel
                            </a>
                            <button type="submit" class="admin-form-btn btn btn-primary admin-form-btn-lg">
                                Update Store
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection