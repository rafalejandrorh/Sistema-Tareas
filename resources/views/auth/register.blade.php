@extends('register')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">

            <form action="/register" method="POST">
                @csrf
                <b><h1>Registrate</h1></b>
                @include('mensajes')
                <div class="mb-3">
                <label for="" class="form-label">Usuario</label>    
                <input class="form-control" type="text" name="username">
                </div>

                <div class="mb-3">
                <label for="" class="form-label">Correo Electrónico</label>    
                <input class="form-control" type="email" name="email">
                </div>
                
                <div class="mb-3">
                <label for="" class="form-label">Contraseña</label>    
                <input class="form-control" type="password" name="password">
                </div>  

                <div class="mb-3">
                <label for="" class="form-label">Confirme su Contraseña</label>    
                <input class="form-control" type="password" name="password_confirmation">
                </div>

                <div class="mb-3"> 
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </div>
                <a href="/login">Haz click aquí para iniciar Sesión.</a>

            </form>

    </div>
</div>

@endsection