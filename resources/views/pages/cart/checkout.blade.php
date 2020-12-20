@extends('layouts.app')

@section('content')
<div class="page-title-area item-bg-1 checkout-header"> 
    <div class="page-title-shape">
        <img src="{{ asset('assets/img/down-shape.png') }}" alt="Mercado 21">
    </div>
</div>

<section class="checkout-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="user-actions">
                    <i class="fas fa-share"></i>
                    <span>Desea ingresar como cliente? <a href="#">Haga click aqui</a></span>
            </div>
        </div>
    </div>
        <form>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="billing-details">
                        <h3 class="title">Detalles de Compra</h3>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Distritos</label>
                                    <div class="select-box">
                                        <select class="form-control">
                                            <option > -- Seleccione su distrito -- </option>
                                            <option value="1">Alto de la Alianza</option>
                                            <option value="2">Calana</option>
                                            <option value="3">Ciudad Nueva</option>
                                            <option value="4">Gregorio Albarracin Lanchipa</option>
                                            <option value="5">Inclan</option>
                                            <option value="6">La Yarada los Palos</option>
                                            <option value="7">Pachia</option>
                                            <option value="8">Pocollay</option>
                                            <option value="9">Sama</option>
                                            <option value="10">Tacna</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Nombres</label>
                                    <input type="text" class="form-control">
                                </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Apellidos</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label>Dirección<span class="required">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label>Numero de Tarjeta</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Titular de Tarjeta</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>CVV</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="notes" id="notes" cols="30" rows="5" placeholder="Mas informacion de la orden..." class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-6 col-md-12">
                    <div class="order-details">
                        <h3 class="title">Lista de Pedidos</h3>
                        <div class="order-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre de Producto</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="product-name">
                                            <a href="#">Dungeon Burgers</a>
                                        </td>
                                        <td class="product-total">
                                            <span class="subtotal-amount">S/.455.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="product-name">
                                            <a href="#">Pit Master Burgers</a>
                                        </td>
                                        <td class="product-total">
                                            <span class="subtotal-amount">S/.541.50</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="product-name">
                                            <a href="#">Backyard Burgers</a>
                                        </td>
                                        <td class="product-total">
                                            <span class="subtotal-amount">S/.140.50</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="total-price">
                                            <span>TOTAL DE ORDEN</span>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="subtotal-amount">S/.1713.50</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <div class="payment-box">
                        <div class="payment-method">
                            <p>
                                <input type="radio" id="direct-bank-transfer" name="radio-group" checked>
                                <label for="direct-bank-transfer">Tarjeta de Crédito</label>
                                Debe llenar obligatoriamente los datos solicitados de: Titular, Numero y CVV de la Tarjeta de crédito.
                                Su pedido no se enviará hasta que los fondos se hayan liquidado en nuestra cuenta.
                            </p>
                            <p>
                                <input type="radio" id="cash-on-delivery" name="radio-group">
                                <label for="cash-on-delivery">Pago Efectivo</label>
                                Puede realizar su pago una vez el pedido haya llegado. 
                            </p>
                        </div>
                        <a href="#" class="default-btn order-btn">COMPRAR<span></span></a>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection