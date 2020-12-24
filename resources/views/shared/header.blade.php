<div class="navbar-area">
    <div class="main-responsive-nav">
        <div class="container">
            <div class="main-responsive-menu">
                <div class="logo">
                    <a href="{{ route('pages.home') }}">
                        <h1>Mercado 21</h1>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main-navbar">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('pages.home') }}">
                    <h1>Mercado 21</h1>
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navBarMenu">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('pages.home') }}" class="nav-link">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pages.menu') }}" class="nav-link">Carta Digital</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pages.restaurants') }}" class="nav-link">Restaurantes</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pages.contact-us') }}" class="nav-link">Contactanos</a>
                        </li>
                    </ul>
                    <div class="others-options d-flex align-items-center">
                        <div class="option-item">
                            <div class="cart-btn">
                                <a href="{{ route('pages.cart.index') }}">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span>{{ Cart::count() }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="option-item">
                            @auth
                            <a href="{{ route('pages.panel.index') }}" class="default-btn">Mi Cuenta<span></span></a>
                            @else
                            <a href="{{ route('login') }}" class="default-btn">Ingresar<span></span></a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>