@extends('layouts.app')

@section('content')
<div class="page-title-area item-bg-1 checkout-header"> 
    <div class="page-title-shape">
        <img src="{{ asset('assets/img/down-shape.png') }}" alt="Mercado 21">
    </div>
</div>

<section class="ptb-50">
    <div class="container">
        <div class="row">
            <div role="tabpanel" class="d-flex align-items-start">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="nav-item"><a class="nav-link active" href="{{ route('pages.panel.index') }}" ><i class="fas fa-arrow-left"></i> Volver</a></li>
                </ul>
            </div>
            
            <div class="tab-content customer-content">
                <div role="tabpanel" class="tab-pane active" >
                    <div class="cart-totals">
                        <h3>Detalle de Pedido N° {{ $order->order_id }}</h3>
                        <ul class="cart-customer-order-detail">
                            <li>Cliente
                                <b>{{ $customer->name}}, {{ $customer->last_name}}</b>
                            </li>
                            <li>Dirección
                                <b>{{ $order->address }} 
                                   {{ ($order->reference != null ? $order->reference : '')}}
                                </b>
                            </li>
                            <li>TOTAL
                                <b>S/. {{ number_format($total_amount, 2) }}</b></b>
                            </li>
                        </ul>
                    </div>         
                    <div class="cart-totals-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Codigo</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col" class="text-center">Cantidad</th>
                                    <th scope="col" class="text-center">Precio por Unidad</th>
                                    <th scope="col" class="text-center">Monto Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($detail as $item)                              
                                <tr>
                                    <td class="product-thumbnail text-center">       
                                        {{ $item->item_code }}
                                    </td>
                                    <td class="product-name">
                                        {{ $item->item_description}}
                                    </td>
                                    <td class="product-price text-center">
                                        <span class="unit-amount">{{$item->quantity}}</span>
                                    </td>
                                    <td class="product-quantity text-center">
                                        S/. {{ $item->unit_price}}
                                    </td>
                                    <td class="product-subtotal text-center">
                                        <span class="amount">S/.{{ $item->amount }}</span>
                                    </td>
                                </tr>
                                @endforeach                        
                            </tbody>
                        </table>
                    </div>
                
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection