@extends('layouts.app')
@section('title', $product->name)
@section('description', $product->description)

@section('content')
<div class="page-title-area item-bg-1" style="background-image: url({{ $product->image }})">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container-lg">
                <div class="page-title-content">
                    <h2>{{ $product->name }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-title-shape">
        <img src="{{ asset('assets/img/down-shape.png') }}" alt="Mercado 21">
    </div>
</div>
<section class="product-details-area pt-100 pb-70">
    <div class="container-lg">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="product-details-image">
                    <img class="w-100" src="{{ $product->image }}" alt="{{ $product->name }}">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="product-details-desc">
                    <h3>{{ $product->name }}</h3>
                    <div class="price">
                        <span class="new-price">S/ {{ $product->price }}</span>
                    </div>
                    <div class="product-review">
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <p>{{ $product->description }}</p>
                    <div class="product-add-to-cart">
                        <div class="input-counter">
                            <span class="minus-btn">
                                <i class="fa fa-minus"></i>
                            </span>
                            <input type="text" min="1" value="1" id="product_detail_quantity" class="quantity">
                            <span class="plus-btn">
                                <i class="fa fa-plus"></i>
                            </span>
                        </div>
                        <button type="button" data-code="{{ $product->product_id }}" class="add_to_cart_detail default-btn">Agregar al Carrito<span></span></button>
                    </div>
                </div>
                <!-- product details -->
            </div>
        </div>
        <!-- row -->
    </div>
    <!-- container lg -->
    <!-- related -->
    <div class="related-products">
        <div class="container-lg">
            <div class="products-title">
                <span class="sub-title">Mercado 21</span>
                <h2>Productos Relacionados</h2>
            </div>
            <div class="row">
                @foreach($related as $product)
                <!-- item -->
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    @include('components.product-item')
                </div>
                <!-- item -->
                @endforeach
            </div>
        </div>
    </div>
    <!-- related -->
   
</section>
@endsection