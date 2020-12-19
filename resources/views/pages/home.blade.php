@extends('layouts.app')

@section('content')
<div class="page-title-area item-bg-1">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container-lg">
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
<section class="pizza-shop-area ptb-100">
    <div class="container-lg">
        <div class="section-title">
            <span>Mercado 21</span>
            <h2>Nuestros Productos</h2>
        </div>
        <div class="row">
            @foreach($products as $product)
            <!-- col -->
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                @include('components.product-item')
            </div>
            <!-- col -->
            @endforeach
        </div>
        <!-- row -->
        <div class="pizza-shop-btn">
            <a href="{{ route('pages.menu') }}" class="default-btn">Ver Carta Digital <i class="flaticon-play-button"></i><span></span></a>
        </div>
    </div>
</section>
@endsection