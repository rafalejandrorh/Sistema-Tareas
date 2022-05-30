@extends('register')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">

            <form action="/login" method="POST">
                @csrf
                <b><h1>Inicio de Sesión</h1></b>
                @include('mensajes')
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Usuario o Correo</label>
                  <input type="TEXT" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">Tu correo no se compartirá con nadie.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <div class="mb-3"> 
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </div>
                <a href="/register">No te has registrado? Haz click aquí para registrarte.</a>
              </form>

    </div>
</div>

@endsection