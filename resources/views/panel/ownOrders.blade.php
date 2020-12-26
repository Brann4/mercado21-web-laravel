<h3>Mis ordenes</h3>
<div class="col-lg-12 col-md-12 col-sm-12 pt-20">
@if (!($orders))
    <label>NO HAY ORDENES EN CURSO</label>
@endif
    <div class="cart-table table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Metodo de Pago</th>
                    <th scope="col">Fecha de pedido</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
                <tr>
                    <td class="product-thumbnail">                      
                    </td>
                    <td class="product-name">
                        <a href="#">{{ $order->order_id }} </a>
                    </td>
                    <td class="product-price">
                        <span class="unit-amount">{{$order->order_date}}</span>
                    </td>
                    <td class="product-quantity">
                        <span class="">{{$order->current_status}}</span>
                    </td>
                    <td class="product-subtotal">
                        <span class="subtotal-amount">{{ S/ $order->total }}</span>
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