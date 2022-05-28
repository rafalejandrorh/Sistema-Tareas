@extends('app')

@section('content')

    <div class="container w-25 border p-4">
            <form action="{{ route('app-update', ['id' => $tareas->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success')}}</h6>
                @endif

                @error('titulo')
                    <h6 class="alert alert-danger">{{'Introduce una tarea'}}</h6>
                @enderror

                <div class="mb-3">
                  <label for="tarea" class="form-label">Título de la Tarea</label>
                  <input type="text" class="form-control" name="titulo" value="{{ $tareas->titulo }}">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar tarea</button>
            </form>

    </div>

@endsection