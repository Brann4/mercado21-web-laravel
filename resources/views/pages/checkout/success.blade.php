@extends('layouts.app')

@section('content')
<div class="page-title-area item-bg-1 checkout-header"> 
    <div class="page-title-shape">
        <img src="{{ asset('assets/img/down-shape.png') }}" alt="Mercado 21">
    </div>
</div>
@if($order->payment_method_id == 1)
<section class="contact-area py-5">
    <div class="container-lg">
        <div class="box-check-c text-center">
            <div>
                <svg width="100" height="100" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 477.867 477.867" style="enable-background:new 0 0 477.867 477.867;" xml:space="preserve" fill="#1F6534">
                    <g>
                        <g>
                            <path d="M238.933,0C106.974,0,0,106.974,0,238.933s106.974,238.933,238.933,238.933s238.933-106.974,238.933-238.933
                                C477.726,107.033,370.834,0.141,238.933,0z M238.933,443.733c-113.108,0-204.8-91.692-204.8-204.8s91.692-204.8,204.8-204.8
                                s204.8,91.692,204.8,204.8C443.611,351.991,351.991,443.611,238.933,443.733z"/>
                        </g>
                    </g>
                    <g>
                        <g>
                            <path d="M370.046,141.534c-6.614-6.388-17.099-6.388-23.712,0v0L187.733,300.134l-56.201-56.201
                                c-6.548-6.78-17.353-6.967-24.132-0.419c-6.78,6.548-6.967,17.353-0.419,24.132c0.137,0.142,0.277,0.282,0.419,0.419
                                l68.267,68.267c6.664,6.663,17.468,6.663,24.132,0l170.667-170.667C377.014,158.886,376.826,148.082,370.046,141.534z"/>
                        </g>
                    </g>
                </svg>
            </div>
            <!-- m -->
            <div class="mt-3">
                <div class="text-c-c-1 text-ct1 font-blockbe font-400">Gracias</div>
                <div class="text-c-c-1 font-700">Tu pedido se completó con éxito</div>
                <div class="text-code-order py-3">Tu Número del Pedido es <br/><span>{{ $order->order_id }}</span></div>
                <div class="text-c-d-1">Recibirá un correo electrónico con los detalles del pedido.</div>
                <div class="mt-4">
                    <a href="{{ route('pages.panel.index') }}" class="btn default-btn">Ir al panel de pedidos</a>
                </div>
            </div>
            <!-- m -->
        </div>
    </div>
</section>
@endif
@if($order->payment_method_id == 3)
<section class="contact-area py-5">
    <div class="container-lg">
        <div class="box-check-c text-center">
            <div>
                <svg width="100" height="100" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 477.867 477.867" style="enable-background:new 0 0 477.867 477.867;" xml:space="preserve" fill="#1F6534">
                    <g>
                        <g>
                            <path d="M238.933,0C106.974,0,0,106.974,0,238.933s106.974,238.933,238.933,238.933s238.933-106.974,238.933-238.933
                                C477.726,107.033,370.834,0.141,238.933,0z M238.933,443.733c-113.108,0-204.8-91.692-204.8-204.8s91.692-204.8,204.8-204.8
                                s204.8,91.692,204.8,204.8C443.611,351.991,351.991,443.611,238.933,443.733z"/>
                        </g>
                    </g>
                    <g>
                        <g>
                            <path d="M370.046,141.534c-6.614-6.388-17.099-6.388-23.712,0v0L187.733,300.134l-56.201-56.201
                                c-6.548-6.78-17.353-6.967-24.132-0.419c-6.78,6.548-6.967,17.353-0.419,24.132c0.137,0.142,0.277,0.282,0.419,0.419
                                l68.267,68.267c6.664,6.663,17.468,6.663,24.132,0l170.667-170.667C377.014,158.886,376.826,148.082,370.046,141.534z"/>
                        </g>
                    </g>
                </svg>
            </div>
            <!-- m -->
            <div class="mt-3">
                <div class="text-c-c-1 text-ct1 font-blockbe font-400">Gracias</div>
                <div class="text-c-c-1 font-700">Tu pedido se completó con éxito</div>
                <div class="text-code-order py-3">Tu Número del Pedido es <br/><span>{{ $order->order_id }}</span></div>
				<div class="py-3 text-center">
					<img width="200px" class="img-fluid" src="{{ asset('assets/img/icons/billetera-electronica.jpg') }}" />
					<div class="py-1"><small>Escanea nuestro código QR a través de tu billetera electrónica.</small></div>
					<img width="200px" class="img-fluid" src="{{ asset('assets/img/icons/qr.svg') }}" />
				</div>
                <div class="text-c-d-1">Recibirá un correo electrónico con los detalles del pedido.</div>
                <div class="mt-4">
                    <a href="{{ route('pages.panel.index') }}" class="btn default-btn">Ir al panel de pedidos</a>
                </div>
            </div>
            <!-- m -->
        </div>
    </div>
</section>
@endif
@if($order->payment_method_id == 4 && $order->payment_status == 1)
<section class="contact-area py-5">
    <div class="container-lg">
        <div class="box-check-c text-center">
            <div>
                <svg width="100" height="100" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 477.867 477.867" style="enable-background:new 0 0 477.867 477.867;" xml:space="preserve" fill="#1F6534">
                    <g>
                        <g>
                            <path d="M238.933,0C106.974,0,0,106.974,0,238.933s106.974,238.933,238.933,238.933s238.933-106.974,238.933-238.933
                                C477.726,107.033,370.834,0.141,238.933,0z M238.933,443.733c-113.108,0-204.8-91.692-204.8-204.8s91.692-204.8,204.8-204.8
                                s204.8,91.692,204.8,204.8C443.611,351.991,351.991,443.611,238.933,443.733z"/>
                        </g>
                    </g>
                    <g>
                        <g>
                            <path d="M370.046,141.534c-6.614-6.388-17.099-6.388-23.712,0v0L187.733,300.134l-56.201-56.201
                                c-6.548-6.78-17.353-6.967-24.132-0.419c-6.78,6.548-6.967,17.353-0.419,24.132c0.137,0.142,0.277,0.282,0.419,0.419
                                l68.267,68.267c6.664,6.663,17.468,6.663,24.132,0l170.667-170.667C377.014,158.886,376.826,148.082,370.046,141.534z"/>
                        </g>
                    </g>
                </svg>
            </div>
            <!-- m -->
            <div class="mt-3">
                <div class="text-c-c-1 text-ct1 font-blockbe font-400 text-success">Tu Pago se realizó con exito</div>
                <div class="text-c-c-1 fw-700">Monto Pagado <br/>S/ {{ $order->total }}</div>
                <div class="text-code-order py-3">Tu Número de Pedido es <br/><span>{{ $order->order_id }}</span></div>
                <div class="mt-4">
                    <a href="{{ route('pages.panel.index') }}" class="btn default-btn">Ir al panel de pedidos</a>
                </div>
            </div>
            <!-- m -->
        </div>
    </div>
</section>
@endif
@if($order->payment_method_id == 4 && $order->payment_status == 0)
<section class="contact-area py-5">
    <div class="container-lg">
        <div class="box-check-c text-center">
            <!-- m -->
            <div class="mt-3">
                <div class="text-c-c-1 text-ct1 font-blockbe font-400">Realizar pago del Pedido</div>
                <div class="text-center py-3">
                    <img src="{{ asset('assets/img/icons/cards.png') }}" />
                </div>
                <div class="text-code-order py-3">Tu Número de Pedido es <br/><span>{{ $order->order_id }}</span></div>
                <div class="mt-4">
                    <input type="hidden" id="order_endpoint" value="{{ route('action.payments.order.charge') }}" />
                    <input type="hidden" id="order_code" value="{{ $order->order_id }}" />
                    <input type="hidden" id="order_total" value="{{ $order->total }}" />
                    <input type="hidden" id="order_total_number" value="{{ ($order->total * 100) }}" />
                    <button type="button" id="btn-culqi-open" class="btn default-btn">Pagar S/ {{ $order->total }} con CULQI</button>
                </div>
            </div>
            <!-- m -->
        </div>
    </div>
</section>
<div class="ui page dimmer" id="dimmer_pay">
    <div class="ui large text loader">Enviando</div>
</div>
<script type="text/javascript">var PUBLIC_KEY = "{{ config('appm21.culqi_keys.public') }}"</script>
@endif
@endsection
@if($order->payment_method_id == 4 && $order->payment_status == 0)
@section('scripts')
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<script src="https://checkout.culqi.com/js/v3"></script>
<script src="{{ asset('assets/js/payment.js') }}"></script>
@endsection
@endif