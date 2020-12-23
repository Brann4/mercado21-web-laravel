@extends('layouts.app')

@section('content')
<div class="page-title-area item-bg-1" style="background-image: url({{ $restaurant->banner }})">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>{{ $restaurant->name }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-title-shape">
        <img src="{{ asset('assets/img/down-shape.png') }}" alt="{{ $restaurant->name }}">
    </div>
</div>
<section class="shop-area ptb-100">
    <div class="container-lg">
        <div class="row">
            @foreach($products as $product)
            <!-- col -->
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                @include('components.product-item')
            </div>
            <!-- col -->
            @endforeach
            <!-- col -->
            <div class="col-lg-12 col-md-12">
                {{ $products->links('pagination::custom') }}
            </div>
            <!-- col -->
        </div>
        <!-- row -->
    </div>
</section>
@endsection