@extends('layouts.app')

@section('content')
<div class="page-title-area item-bg-1">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container-lg">
                <div class="page-title-content">
                    <h2>Carrito</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-title-shape">
        <img src="{{ asset('assets/img/down-shape.png') }}" alt="Mercado 21">
    </div>
</div>

@if(Cart::count() == 0)
<section class="cart-area ptb-100">
    <div class="container-lg">
        <div class="w-100">
        <!-- cart empty-->
        <div class="w-100 py-3">
            <div class="container">   
                <div class="row">
                    <div class="col-12">
                        <div class="w-100 text-center">
                            <div class="pb-4">
                                <img class="img-fluid" width="250px" src="{{ asset('assets/img/icons/cart-empty.svg') }}">
                            </div>
                            <h3 class="font-title font-700 m-0">Tu carrito está vacío</h3>
                            <div class="mt-5">
                                <a href="{{ route('pages.menu') }}" class="btn btn-md btn-black">Agregar Productos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        <!-- cart empty--> 
        </div>
    </div>
</section>
@else
<section class="cart-area ptb-100">
    <div class="container-lg">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <form>
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Precio Unitario</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Cart::content() as $row)
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="">
                                            <img src="{{ $row->options->image }}" alt="Mercado 21">
                                        </a>
                                    </td>
                                    <td class="product-name">
                                        <a href="">{{ $row->name }}</a>
                                    </td>
                                    <td class="product-price">
                                        <span class="unit-amount">S/ {{ number_format($row->price, 2) }}</span>
                                    </td>
                                    <td class="product-quantity">
                                        <div class="input-counter" data-row="{{ $row->rowId }}">
                                            <span class="minus-btn update_to_cart"><i class="fas fa-minus"></i></span>
                                            <input type="text" step="1" min="1" class="quantity" id="product_cart_quantity" name="quantity" value="{{ $row->qty }}">
                                            <span class="plus-btn update_to_cart"><i class="fas fa-plus"></i></span>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="subtotal-amount">S/ {{ number_format($row->total, 2) }}</span>
                                        <a href="#" class="remove remove_from_cart" data-row="{{ $row->rowId }}"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach                           
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-buttons">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-6 text-center">
                                <a href="{{ route('pages.menu') }}" class="default-btn">Seguir comprando<span></span></a>                    
                            </div>
                        </div>
                    </div>
                    <div class="cart-totals">
                        <h3>Total del Carrito</h3>
                        <ul>
                            <li>Subtotal
                            <span>S/ {{ number_format(Cart::subtotal(), 2) }}</span>
                            </li>
                            <li>Total
                            <span><b>S/ {{ number_format(Cart::total(), 2) }}</b></span>
                            </li>
                        </ul>
                        <a href="{{ route('pages.cart.checkout') }}" class="btn-block default-btn">PROCEDER CON EL PAGO<span></span></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endif
@endsection