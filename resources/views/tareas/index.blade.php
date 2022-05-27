@extends('app')

@section('content')

    <div class="container w-25 border p-4">
            <form action="{{ route('app') }}" method="POST">
                @csrf
                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success')}}</h6>
                @endif

                @error('titulo')
                    <h6 class="alert alert-danger">{{'Introduce una tarea'}}</h6>
                @enderror
                <div class="mb-3">
                  <label for="tarea" class="form-label">Título de la Tarea</label>
                  <input type="text" class="form-control" name="titulo">
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Categoría de la Tarea</label>
                    <select name="category_id" class="form-select">
                        @foreach ($categories as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach    
                    </select>

                  </div>
                <button type="submit" class="btn btn-primary">Crear nueva tarea</button>
            </form>

            <div>
                @foreach ($tareas as $item)
                    <div class="row py-1">
                        <div class="col-md-9 d-flex align-items-center">
                            <a href="{{ route('app-edit', ['id' => $item->id]) }}"> {{ $item->titulo }}</a>
                        </div>

                        <div class="col-md-3 d-flex justify-content-end">
                            <form action="{{ route('app-destroy', [$item->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>

@endsection