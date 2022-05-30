@extends('register')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">

            <form action="/login" method="POST">
                @csrf
                <div class="mb-3">
                <label for="" class="form-label">Usuario o Correo</label>    
                <input class="form-control" type="text" name="username">
                </div>
                
                <div class="mb-3">
                <label for="" class="form-label">Contraseña</label>    
                <input class="form-control" type="password" name="password">
                </div> 

                <div class="mb-3"> 
                <input class="form-control" type="submit" value="Iniciar Sesión">
                </div>

            </form>

    </div>
</div>

@endsection