@extends('seller.layouts.layout')
@section('seller_title','Manage Products - Seller Panel')
@section('seller_layout')

@php
use Illuminate\Support\Facades\Storage;
@endphp

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-12">
            <div class="admin-form-card admin-form-shadow">
                <div class="admin-form-card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 text-white">All Products</h4>
                </div>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">SKU</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">SubCategory</th>
                                    <th scope="col">Store</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Tax</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Visibility</th>
                                    <th scope="col">Meta Title</th>
                                    <th scope="col">Meta Desc</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        @if($product->images && $product->images->count() > 0)
                                            <img src="{{ Storage::url($product->images->first()->image_path) }}" alt="{{ $product->name }}" style="width: 50px; height: 50px; object-fit: cover;" class="rounded">
                                        @else
                                            <img src="{{ asset('admin_asset/img/no-image.png') }}" alt="No Image" style="width: 50px; height: 50px; object-fit: cover;" class="rounded">
                                        @endif
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                                    <td>{{ $product->subcategory->name ?? 'N/A' }}</td>
                                    <td>{{ $product->store->name ?? 'N/A' }}</td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td>${{ $product->discounted_price ? number_format($product->discounted_price, 2) : 'N/A' }}</td>
                                    <td>{{ $product->tax_rate }}%</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->slug }}</td>
                                    <td>
                                        <span class="badge {{ $product->visibility ? 'bg-success' : 'bg-warning' }}">
                                            {{ $product->visibility ? 'Visible' : 'Hidden' }}
                                        </span>
                                    </td>
                                    <td>{{ $product->meta_title }}</td>
                                    <td>{{ Str::limit($product->meta_description, 30) }}</td>
                                    <td>
                                        <span class="badge 
                                            @if($product->status == 'published') bg-success
                                            @elseif($product->status == 'draft') bg-secondary
                                            @else bg-warning
                                            @endif">
                                            {{ ucfirst($product->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $product->created_at->format('d M, Y') }}</td>
                                    <td>
                                        <a href="{{ route('vendor.product.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('vendor.product.destroy', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="19" class="text-center py-4">
                                        <p class="text-muted">No products found.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection