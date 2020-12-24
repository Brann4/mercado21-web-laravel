<section class="footer-area pt-100">
    <div class="container">
        <div class="footer-content-item pb-0">
            <a href="{{ route('pages.home') }}">
                <img src="{{ asset('assets/img/logo-footer.png') }}" alt="image">
            </a>
            <ul class="list">                
                <li>
                    <a href="{{ route('pages.home') }}">Inicio</a>
                </li>
                <li>
                    <a href="{{ route('pages.menu') }}">Carta Digital</a>
                </li>
                <li>
                    <a href="{{ route('pages.restaurants') }}">Restaurantes</a>
                </li>
                <li>
                    <a href="{{ route('pages.contact-us') }}">Contactanos</a>
                </li>
            </ul>
        </div>
        <div class="text-center py-3">
            <img width="50px" class="img-fluid m-2" src="{{ asset('assets/img/icons/visa-logo-b.svg') }}" alt="Visa">
            <img width="50px" class="img-fluid m-2" src="{{ asset('assets/img/icons/mastercard-logo-w.svg') }}" alt="Mastercard">
            <img width="50px" class="img-fluid m-2" src="{{ asset('assets/img/icons/americanexpress-logo-b.svg') }}" alt="American Express">
            <img width="50px" class="img-fluid m-2" src="{{ asset('assets/img/icons/diners-logo-b.svg') }}" alt="Diners Club">
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <p>
                <i class="far fa-copyright"></i> 2020 Todos los derechos reservados.
            </p>
            <ul class="social">
                <li class="facebook">
                    <a href="#" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="twitter">
                    <a href="#" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="instagram">
                    <a href="#" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
                <li class="whatsapp">
                    <a href="#" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="footer-shape">
        <img src="{{ asset('assets/img/footer-shape.png') }}" alt="Mercado 21">
    </div>
</section>