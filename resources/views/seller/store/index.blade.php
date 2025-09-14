@extends('seller.layouts.layout')
@section('seller_title','Manage Stores - Seller Panel')
@section('seller_layout')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-12">
            <div class="admin-form-card admin-form-shadow">
                <div class="admin-form-card-header">
                    <h4 class="mb-0 text-white">All Stores</h4>
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
                                    <th scope="col">Store Name</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($stores as $store)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $store->name }}</td>
                                    <td>{{ Auth::user()->name }}</td>
                                    <td>{{ $store->slug }}</td>
                                    <td>{{ $store->details ?? 'N/A' }}</td>
                                    <td>{{ $store->created_at->format('d M, Y') }}</td>
                                    <td>
                                        <a href="{{ route('vendor.store.edit', $store->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('vendor.store.destroy', $store->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No stores found.</td>
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