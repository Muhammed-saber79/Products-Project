@extends('layouts.app')

@section('title')
RayaGate Project
@endsection

@section('header')
RayaGate Project
@endsection

@section('content')
<div class="row my-3 d-flex justify-content-center">
	<div class="col-md-4 mb-4 d-flex justify-content-center">
        <a href="{{ route('product.index') }}">
            <button class="fw-bold"> Dive Into The Project! </button>
        </a>
        <style>
            button {
                width: 15em;
                height: 3em;
                border-radius: 30em;
                font-size: 15px;
                font-family: inherit;
                border: none;
                position: relative;
                overflow: hidden;
                z-index: 1;
                box-shadow: 6px 6px 12px #c5c5c5, -6px -6px 12px #ffffff;
            }

            button::before {
                content: '';
                width: 0;
                height: 3em;
                border-radius: 30em;
                position: absolute;
                top: 0;
                left: 0;
                background-image: linear-gradient(to right, #0fd850 0%, #f9f047 100%);
                transition: .5s ease;
                display: block;
                z-index: -1;
            }

            button:hover::before {
                width: 15em;
            }
        </style>
    </div>
</div>
@endsection