@extends('layouts.app')

@section('title')
Products
@endsection

@section('header')
Listing All Products
@endsection

@section('content')
<div class="row">
	<x-toaster />
</div>
<div class="row my-1">
	<a href="{{ route('product.create') }}" class="btn btn-primary w-25">Add Product</a>
</div>
<div class="row my-3">
	<table class="table table-striped table-bordered">
		<thead class="bg-info">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Product Name</th>
				<th scope="col">Price</th>
				<th scope="col">Quantity</th>
				<th scope="col">Description</th>
				<th scope="col">Categries</th>
				<th scope="col" class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($products as $product)
				<tr>
					<th scope="row">{{ $product->id }}</th>
					<td>{{ $product->name }}</td>
					<td>${{ $product->price }}</td>
					<td>{{ $product->quantity }}</td>
					<td>{!! $product->description ?? "<small class='text-muted'>No Description</small>" !!}</td>
					<td>
						@forelse ($product->categories as $category)
							{!! "<span class='text-primary'>$category->name<span>" . ', ' !!}
						@empty
							<small class="text-muted">No Categories</small>
						@endforelse
					</td>
					<td class="text-center">
						<a href="{{ route('product.show', $product->id) }}" class="text-decoration-none">
							<i class="fa-solid fa-circle-info" style="color: #0ceaed; margin-right: 10px"></i>
						</a>
					</td>
				</tr>
			@empty
				<tr>
					<td colspan="5"><h5 class="text-center text-danger">No products added yet</h5></td>
				</tr>
			@endforelse
		</tbody>
	</table>
</div>
<div class="row">
	{{ $products->links() }}
</div>
@endsection