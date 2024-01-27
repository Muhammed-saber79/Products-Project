@extends('layouts.app')

@section('title')
Create New Product
@endsection

@section('header')
Create New Product
@endsection

@section('content')
<div class="row">
    <x-toaster />
</div>
<div class="row my-3">
    <div class="col-md-4 mb-4 mx-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Create New Product</h5>
                <form action="{{ route('product.store') }}" method="POST">
                    @csrf
                    <div class="form-group my-3">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="price">Price</label>
                        <input type="number" step="0.001" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" required>
                        @error('quantity')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="categries" class="form-label">Product Categries</label>
                        <div class="row d-flex flex-row justify-content-between">
                            @forelse ($categories as $category)
                            <div class="mx-3">
                                <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" id="category_{{ $category->id }}">
                                <label class="form-check-label" for="category_{{ $category->id }}">
                                    {{ $category->name }}
                                </label>
                            </div>
                            @empty
                                <small class="text-muted mx-3">No categories exist</small>
                            @endforelse
                        </div>
                        @error('categries')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Create Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <a href="{{ route('product.index') }}" class="btn btn-info mx-auto w-25">Return To Products List</a>
</div>
@endsection