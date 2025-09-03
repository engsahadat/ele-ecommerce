@extends('admin.layouts.layout')
@section('admin_title','Edit Product Attribute - Admin Panel')
@section('admin_layout')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10 col-md-12">
            <div class="admin-form-card admin-form-shadow">
                <div class="admin-form-card-header">
                    <h4 class="mb-0 text-white">Edit Product Attribute</h4>
                </div>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('productattributes.update', $attribute->id) }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="attribute_value" class="form-label">Attribute Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('attribute_value') is-invalid @enderror"   id="attribute_value" name="attribute_value" value="{{ old('attribute_value', $attribute->attribute_value) }}" placeholder="Enter attribute name">
                            @error('attribute_value')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-center pt-3">
                            <a href="{{ route('productattributes.index') }}" class="admin-form-btn btn btn-outline-secondary admin-form-btn-lg">
                                Cancel
                            </a>
                            <button type="submit" class="admin-form-btn btn btn-primary admin-form-btn-lg">
                                Update Product Attribute
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection