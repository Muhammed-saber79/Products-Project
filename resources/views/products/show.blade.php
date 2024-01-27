@extends('layouts.app')

@section('title')
Product Details
@endsection

@section('header')
Product Details
@endsection

@section('content')
<div class="row my-3">
	<div class="col-md-4 mb-4 mx-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">{{ $product->name }}</h5>
                <p class="card-text"><strong>ID:</strong> {{ $product->id }}</p>
                <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                <p class="card-text"><strong>Quantity:</strong> {{ $product->quantity }}</p>
                <p class="card-text"><strong>Description:</strong> {!! $product->description ?? "<small class='text-muted'>No Description</small>" !!}</p>
                <p class="card-text"><strong>Categories:</strong>
                    @forelse ($product->categories as $category)
                        {!! "<span class='text-primary'>$category->name<span>" . ', ' !!}
                    @empty
                        <small class="text-muted">No Categories</small>
                    @endforelse
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <a href="{{ route('product.index') }}" class="btn btn-info mx-auto w-25">Return To Products List</a>
</div>
@endsection