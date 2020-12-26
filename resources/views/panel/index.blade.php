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
                    <li role="presentation" class="nav-item"><a class="nav-link active" href="#Inicio" data-toggle="tab" role="tab">Inicio</a></li>
                    <li role="presentation"><a class="nav-link"  href="#miCuenta" data-toggle="tab" role="tab">Cuenta</a></li>
                    <li role="presentation"><a class="nav-link"  href="#Ordenes" data-toggle="tab" role="tab">Mis Ordenes</a></li>
                    <li role="presentation">
                        <a class="nav-link"  
                           href="{{ route('logout')}}"  
                           data-toggle="tab" 
                           role="tab"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                           Cerrar Sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
            <div class="tab-content customer-content">
                <div role="tabpanel" class="tab-pane active" id="Inicio">
                    @include('panel.changePassword')
                </div>
                <div role="tabpanel" class="tab-pane" id="miCuenta">
                    @include('panel.updateAccount')
                </div>
                <div role="tabpanel" class="tab-pane" id="Ordenes">
                     @include('panel.ownOrders')

                </div>
            </div>
    </div>
</section>
@endsection