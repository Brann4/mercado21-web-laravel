@if(Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif  
<label>Bienvenido!</label><h3>{{ Auth::user()->name}}, {{ Auth::user()->last_name}}</h3>
<p>Este es su Panel de Control donde puede ver un resumen de sus pedidos y ordenes</p>
    <div class="pt-10">   
            <form action="{{ route('pages.panel.changePassword')}}" method="POST">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label class="form-label">Cambiar contraseña:</label>
                    <input class="form-control" type="password" id="current_passowrd" name="current_password" placeholder="Contraseña actual" >
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" id="new_password" name="new_password" placeholder="Nueva contraseña">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" id="new_password_confirm" name="new_password_confirm" placeholder="Repetir nueva contraseña">
                </div>
                                   
                <button class="btn default-btn" type="submit">Cambiar</button>
            </form>                        
    </div>