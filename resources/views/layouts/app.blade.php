<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @hasSection('title')
    <title>@yield('title') | Mercado 21</title>
    @else
    <title>Mercado 21</title>
    @endif
    @hasSection('description')
    <meta name="description" content="@yield('description')" />
    @else
    <meta name="description" content="Sanguches y Carnes Ahumadas, Bebidas y Cocteles, Comida con Calle y Esquina, Comida Fusión Peruano-Japonesa y Comida Fusión Peruana-Oriental" />
    @endif
	<meta name="author" content="Mercado 21" />
	<meta name="googlebot" content="all, index, follow" />
    <meta name="theme-color" content="#000000" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="icon" type="image/png" href="assets/img/favicon.jpg">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
    <script type="text/javascript">var APP_URL = {!! json_encode(url('/')) !!}</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-02PTDKCLC9"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-02PTDKCLC9');
	</script>
</head>
<body>
    <!-- preload -->
    <div class="preloader">
        <div class="lds-ripple">
		    <div></div>
			<div></div>
		</div>
	</div>
    <!-- preload -->
    <!-- navbar -->
    @include('shared.header')
    <!-- navbar -->
    <!-- content -->
    @yield('content')
    <!-- content -->
    <!-- footer -->
    @include('shared.footer')
    <!-- footer -->
    <div class="modal fade" id="ModalCartResponse" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm" id="cart_added_message"></div>
    </div>
    <!-- go top -->
    <div class="go-top">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!-- go top -->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>