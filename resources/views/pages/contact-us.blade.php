@extends('layouts.app')

@section('content')
<div class="page-title-area item-bg-1">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container-lg">
                <div class="page-title-content">
                    <h2>Contactanos</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-title-shape">
        <img src="{{ asset('assets/img/down-shape.png') }}" alt="Mercado 21">
    </div>
</div>
<section class="contact-area pb-100">
    <div class="container">
        <div class="contact-form">
            <div class="title">
                <span>Mercado 21</span>
                <h3>Contactanos</h3>
            </div>
            <form id="contactForm">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" required data-error="Porfavor ingrese su nombre" placeholder="Nombre">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" required data-error="Porfavor ingrese su correo electronico" placeholder="Correo Electrónico">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>                    
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <textarea name="message" class="form-control" id="message" cols="30" rows="5" required data-error="Escribe tu mensaje" placeholder="Mensaje"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <button type="submit" class="default-btn">Send Message<i class="flaticon-play-button"></i><span></span></button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<div class="map pb-100">
    <div class="container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15176.906127912755!2d-70.2457334!3d-18.0146876!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5dc28e717af60753!2sMercado%2021!5e0!3m2!1ses-419!2spe!4v1608432399216!5m2!1ses-419!2spe" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
</div>

@endsection