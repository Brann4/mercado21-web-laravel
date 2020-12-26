<h3>Perfil de Usuario</h3>
    <div class="ptb-10">

            <form action="{{ route('pages.panel.updateAccount')}}" method="POST">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre(s):</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="{{ Auth::user()->name}}" >
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Apellido(s):</label>
                    <input class="form-control" type="text" id="last_name" name="last_name" placeholder="{{ Auth::user()->last_name}}" >
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Telefono:</label>
                    <input class="form-control" type="text" id="cell_phone" name="cell_phone" placeholder="{{ Auth::user()->cell_phone}}" >
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Correo Electronico:</label>
                    <input class="form-control" type="text" id="email" name="email" placeholder="{{ Auth::user()->email}}" >
                </div>
                           
                <button class="btn default-btn" type="submit">Actualizar</button>
            </form>                        
    </div>