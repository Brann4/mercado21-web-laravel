<div class="pizza-shop-item">
    <div class="image">
        <img src="{{ $product->image }}" alt="{{ $product->name }}">
        <div class="pizza-btn">
            <a href="" class="default-btn">Agregar Carrito <i class="fas fa-cart-plus"></i><span></span></a>
        </div>
    </div>
    <div class="content">
        <h3>{{ $product->name }}</h3>
        <div class="rating">
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
        </div>
        <p>{{ $product->description }}</p>
        <span>S/{{ $product->price }}</span>
    </div>
</div>