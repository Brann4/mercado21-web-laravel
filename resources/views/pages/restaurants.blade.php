@extends('layouts.app')
@section('title', 'Restaurantes')

@section('content')
<div class="page-title-area item-bg-1" style="height: 200px">
    <div class="page-title-shape">
        <img src="{{ asset('assets/img/down-shape.png') }}" alt="Mercado 21">
    </div>
</div>
<section class="blog-area pt-100 pb-100">
    <div class="container-lg">
        <div class="section-title">
            <span>Mercado 21</span>
            <h2>Nuestros Restaurantes</h2>
        </div>
        <div class="row justify-content-center">
            @foreach($restaurants as $restaurant)
            <!-- col -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="image">
                        <a href="{{ route('pages.restaurant', ['id' => $restaurant->restaurant_id, 'title' => str_slug($restaurant->name)]) }}">
                            <img src="{{ $restaurant->banner }}" alt="{{ $restaurant->name }}">
                        </a>
                    </div>
                    <div class="content">
                        <h3><a href="{{ route('pages.restaurant', ['id' => $restaurant->restaurant_id, 'title' => str_slug($restaurant->name)]) }}">{{ $restaurant->name }}</a></h3>
                        <p>{{ $restaurant->description }}</p>
                    </div>
                </div>
            </div>
            <!-- col -->
            @endforeach
        </div>
        <!-- row -->
    </div>
</section>
@endsection