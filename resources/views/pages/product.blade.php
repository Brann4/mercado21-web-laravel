@extends('layouts.app')

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
                        <a href="#" class="rating-count">3 reviews</a>
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
    <!-- reviews -->
    <div class="w-100">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="product-review-form pt-5 pb-2">
                        <h3>Customer Reviews</h3>
                        <div class="review-title">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>Based on 3 reviews</p>
                            <a href="#" class="default-btn">Write a Review<span></span></a>
                        </div>
                        <!-- review comments -->
                        <div class="review-comments">
                            <!-- item -->
                            <div class="review-item">
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <h3>Good</h3>
                                <span><strong>Admin</strong> on <strong>Sep 21, 2019</strong></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                            </div>
                            <!-- item -->
                        </div>
                        <!-- review comments -->
                        <!-- review form -->
                        <div class="review-form">
                            <h3>Write a Review</h3>
                            <!-- form -->
                            <form>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" id="name" name="name" placeholder="Enter your name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="email" id="email" name="email" placeholder="Enter your email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" id="review-title" name="review-title" placeholder="Enter your review a title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="review-body" id="review-body" cols="30" rows="7" placeholder="Write your comments here" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn">Submit Review<span></span></button>
                                    </div>
                                </div>
                                <!-- row -->
                            </form>
                            <!-- form -->
                        </div>
                        <!-- review form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection