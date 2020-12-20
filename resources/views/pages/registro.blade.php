@extends('layouts.app')

@section('content')
<div class="page-title-area item-bg-1 checkout-header"> 
    <div class="page-title-shape">
        <img src="{{ asset('assets/img/down-shape.png') }}" alt="Mercado 21">
    </div>
</div>


<div class="signup-area ptb-100">
    <div class="container">
        <div class="signup-form">
        
            <h3>Crea tu Cuenta</h3>
            <form>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nombre de Usuario">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Correo electrónico">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="send-btn">
                            <button type="#" class="default-btn">Registrar<span></span></button>
                        </div>
                        <br>
                        <span>Ya tienes cuenta? <a href="{{ route('pages.login') }}">Ingresa!</a></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection