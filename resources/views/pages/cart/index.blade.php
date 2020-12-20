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

<section class="cart-area ptb-100">
    <div class="container">
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
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="">
                                            <img src="assets/img/shop/image1.jpg" alt="Mercado 21">
                                        </a>
                                    </td>
                                    <td class="product-name">
                                        <a href="">Burger Bistro</a>
                                    </td>
                                    <td class="product-price">
                                        <span class="unit-amount">$455.00</span>
                                    </td>
                                    <td class="product-quantity">
                                        <div class="input-counter">
                                            <span class="minus-btn"><i class="fas fa-minus"></i></span>
                                            <input type="text" value="1">
                                            <span class="plus-btn"><i class="fas fa-plus"></i></span>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="subtotal-amount">$455.00</span>
                                        <a href="#" class="remove"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>                               
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-buttons">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <a href="{{ route('pages.home') }}" class="default-btn">Seguir comprando<span></span></a>                    
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 text-right">
                                <a href="#" class="default-btn">Actualizar precios<span></span><i class="fas fa-redo-alt"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="cart-totals">
                        <h3>Total del Carrito</h3>
                        <ul>
                            <li>Subtotal
                            <span>S/.1683.50</span>
                            </li>
                            <li>IGV
                            <span>S/.30.00</span>
                            </li>
                            <li>Total
                            <span><b>S/.1713.50</b></span>
                            </li>
                        </ul>
                        <a href="{{ route('pages.cart.checkout') }}" class="btn-block default-btn">PROCEDER CON EL PAGO<span></span></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection