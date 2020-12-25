@extends('layouts.app')

@section('content')
<div class="page-title-area item-bg-1 checkout-header"> 
    <div class="page-title-shape">
        <img src="{{ asset('assets/img/down-shape.png') }}" alt="Mercado 21">
    </div>
</div>

<section class="checkout-area ptb-100">
    <div class="container-lg">
        <form id="form_checkout" method="POST" action="{{ route('action.checkout.order.store') }}">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="billing-details">
                        <h3 class="title">Detalles del Pedido</h3>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Correo electrónico</label>
                                    <input type="text" value="{{ Auth::user()->email }}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Nombres</label>
                                    <input type="text" value="{{ Auth::user()->name }}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <input type="text" value="{{ Auth::user()->last_name }}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Teléfono <span class="required">*</span></label>
                                    <input type="text" name="cell_phone" value="{{ Auth::user()->cell_phone }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Distrito <span class="required">*</span></label>
                                    <div class="select-box">
                                        <select class="form-control" name="district_id" required>
                                            <option value=""> -- Seleccione su distrito -- </option>
                                            @foreach($ubigeos as $ubigeo)
                                            <option value="{{ $ubigeo->ubigeo_id }}">{{ $ubigeo->district }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <label>Dirección <span class="required">*</span></label>
                                    <input type="text" name="address" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Referencia</label>
                                    <textarea name="reference" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- invoice data -->
                    <div class="billing-details mt-4">
                        <div class="d-flex aling-items-center">
                            <div class="flex-grow-1">
                                <h3 class="title">Datos de Facturación</h3>
                            </div>
                            <div class="ml-2">
                                <div class="custom-control custom-switch p-0 m-0">
                                    <input type="checkbox" name="billing_status" class="custom-control-input" id="switchInvoice">
                                    <label class="custom-control-label" for="switchInvoice"></label>
                                </div>
                            </div>
                        </div>
                        <div class="collapse" id="collapseInvoiceData">
                            <!-- df -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Tipo de Comprobante <span class="required">*</span></label>
                                        <input type="hidden" name="document_type" id="document_type" class="form-control" value="01" readonly>
                                        <select class="form-control" name="invoice_type" id="invoice_type" required>
                                            <option value="03">BOLETA DE VENTA</option>
                                            <option value="01">FACTURA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Número de Documento <span id="doc_type">(DNI)</span><span class="required">*</span></label>
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="text" name="document_number" id="document_number" class="form-control" required>
                                            </div>
                                            <div>
                                                <button type="button" id="validate_data_person" class="btn btn-sm btn-dark btn-validate-sunat h-auto py-3">VALIDAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Denominación <span class="required">*</span></label>
                                        <input type="text" name="denomination" id="denomination" class="form-control" required readonly>
                                    </div>
                                </div>
                            </div>
                            <!-- df -->
                        </div>
                    </div>
                    <!-- invoice data -->
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
                                    @foreach(Cart::content() as $row)
                                    <tr>
                                        <td class="product-name">
                                            <a href="{{ route('pages.product', ['id' => $row->id, 'title' => str_slug($row->name)]) }}">{{ $row->name }}</a>
                                        </td>
                                        <td class="product-total">
                                            <span class="subtotal-amount">S/ {{ number_format($row->total, 2) }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td class="total-price">
                                            <span>TOTAL DE ORDEN</span>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="subtotal-amount">S/ {{ number_format(Cart::total(), 2) }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <div class="payment-box">
                        <div class="payment-method">
                            <p>
                                <input type="radio" id="direct-bank-transfer" name="payment_method_id" value="4" checked>
                                <label for="direct-bank-transfer">Tarjeta de Crédito (CULQI)</label>
                                <div class="px-2 px-md-3">
                                    <img class="img-fluid" src="{{ asset('assets/img/icons/cards.png') }}" />
                                </div>
                            </p>
                            <p>
                                <input type="radio" id="electronic-wallet" name="payment_method_id" value="3">
                                <label for="electronic-wallet">Billetera Electrónica (Yape, Lukita, Tunki)</label>
                                <div class="w-100 px-2 px-md-3">
                                    <img width="200px" class="img-fluid" src="{{ asset('assets/img/icons/billetera-electronica.jpg') }}" />
                                    <div class="py-1"><small>Escanea nuestro código QR a través de tu billetera electrónica.</small></div>
                                    <img width="200px" class="img-fluid" src="{{ asset('assets/img/icons/qr.svg') }}" />
                                </div>
                            </p>
                            <p>
                                <input type="radio" id="cash-on-delivery" name="payment_method_id" value="1">
                                <label for="cash-on-delivery">Contra Entrega</label>
                                Puede realizar su pago una vez el pedido haya llegado. 
                            </p>
                        </div>
                        <div>
                            {{ csrf_field() }}
                            <button type="submit" id="button_order_submit" class="default-btn order-btn">REALIZAR PEDIDO S/ {{ number_format(Cart::total(), 2) }}<span></span></button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection