<div class="modal-content modal-product-added py-2">
    <button type="button" class="modal-added-close close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <div class="modal-body">
        <i class="fa fa-check"></i>
        <p class="modal-product-added-message">Producto agregado<br> al Carrito</p>
        <div class="modal-product-added-actions">
            <a href="{{ route('pages.cart.index') }}" class="btn btn-added">Ir al Carrito</a>
            <a href="{{ route('pages.cart.checkout') }}" class="btn btn-added-dark">Checkout</a>
            <a href="#" onClick="return false" data-dismiss="modal" class="btn-added-light">Seguir comprando</a>
        </div>
    </div>
</div>