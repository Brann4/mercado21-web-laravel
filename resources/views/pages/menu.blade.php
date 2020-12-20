@extends('layouts.app')

@section('content')
<div class="page-title-area item-bg-1">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>Carta Digital</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-title-shape">
        <img src="{{ asset('assets/img/down-shape.png') }}" alt="Mercado 21">
    </div>
</div>

<section class="shop-area ptb-100">
    <div class="container-lg">   
        <div class="section-title">
            <span>Mercado 21</span>
        </div>
        <div class="woocommerce-topbar">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="w-100 text-center">                      
                        <ul class="list-unstyled p-0 m-0">
                            @foreach($restaurants as $restaurant)
                            <li class="item-restaurant">                                    
                                <a href="#" data-toggle="tooltip" data-placement="bottom">
                                    <img width="100px" class="img-fluid img-res" src="{{ $restaurant->logo }}" alt="{{ $restaurant->name }}">
                                </a>                                    
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>                    
            </div>
        </div>
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