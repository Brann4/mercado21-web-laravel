<h3 class="pt-20">Mis ordenes</h3>

<div class="col-lg-12 col-md-12 col-sm-12 pt-20">
    <div class="cart-table table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col text-center">Codigo</th>
                    <th scope="col text-center">Metodo de Pago</th>
                    <th scope="col text-center">Fecha y Hora</th>
                    <th scope="col">Estado del Pedido</th>
                    <th scope="col text-center">Total</th>
                </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
                <tr>
                    <td class="product-thumbnail text-center">       
                        <a href="{{ route('pages.panel.orderDetail', ['id' => $order->order_id]) }}">{{ $order->order_id}}</a>                    
                    </td>
                    <td class="product-name">
                        <a href="#">
                            @if($order->payment_method_id == 4)
                                <div class="px-2 px-md-3">
                                    <img class="img-fluid" src="{{ asset('assets/img/icons/cards.png') }}" />
                                </div>
                            @endif
                            @if($order->payment_method_id == 3)
                                <div class="px-2 px-md-3">
                                    <img class="img-fluid" src="{{ asset('assets/img/icons/billetera-electronica.jpg') }}" />
                                </div>
                            @endif
                            @if($order->payment_method_id == 1)
                                <div class="px-2 px-md-3">
                                    
                                </div>
                            @endif
                        </a>
                    </td>
                    <td class="product-price">
                        <span class="unit-amount">{{$order->order_date}} {{ $order-> order_hour}}</span>
                    </td>
                    <td class="product-quantity text-center">
                            @if($order->current_status == 1) 
                                <span class="badge badge-secondary">Nuevo</span>
                            @endif
                            @if($order->current_status == 2) 
                                <span class="badge badge-info">Aceptado</span>
                            @endif
                            @if($order->current_status == 3) 
                                <span class="badge badge-warning">En Preparación</span>
                            @endif
                            @if($order->current_status == 4) 
                                <span class="badge badge-primary">Empaquetado y Enviado</span>
                            @endif
                            @if($order->current_status == 5) 
                                <span class="badge badge-success">Completado</span>
                            @endif
                        
                    </td>
                    <td class="product-subtotal">
                        <span class="subtotal-amount">S/.{{ $order->total }}</span>
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
</div>

