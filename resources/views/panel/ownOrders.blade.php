<h3 class="pt-20">Mis ordenes</h3>

<div class="col-lg-12 col-md-12 col-sm-12 pt-20">
    <div class="cart-table table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
					<th></th>
                    <th scope="col" class="text-center">Codigo</th>
                    <th scope="col" class="text-center">Metodo de Pago</th>
                    <th scope="col" class="text-center">Fecha y Hora</th>
                    <th scope="col" class="text-center">Estado del Pedido</th>
                    <th scope="col" class="text-center">Total</th>
                </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
                <tr>
					<td class="text-center">
						<a href="{{ route('pages.panel.orderDetail', ['id' => $order->order_id]) }}" title="Ver Pedido"><i class="fa fa-eye"></i></a> 
					</td>
                    <td class="product-thumbnail text-center">       
                        <a href="{{ route('pages.panel.orderDetail', ['id' => $order->order_id]) }}">{{ $order->order_id}}</a>                    
                    </td>
                    <td class="product-name text-center">
						<span class="unit-amount">{{ $order->paymentMethod->name }}</span>
                    </td>
                    <td class="product-price text-center">
                        <span class="unit-amount">{{$order->order_date}} {{ $order-> order_hour}}</span>
                    </td>
                    <td class="product-quantity text-center">
                            @if($order->payment_status == 0) 
                                <span class="badge badge-danger">Sin pagar</span>
                            @endif
                            @if($order->payment_status == 1) 
                                <span class="badge badge-success">Pagado</span>
                            @endif

                        
                    </td>
                    <td class="product-subtotal text-center">
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
                <a href="{{ route('pages.menu') }}" class="default-btn">Ir a comprar<span></span></a>                    
            </div>
        </div>
    </div>             
</div>

