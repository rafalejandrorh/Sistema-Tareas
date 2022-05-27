@extends('app')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">

    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
        @method('PATCH')
        @csrf

        @if (session('success'))
            <h6 class="alert alert-success">{{ session('success')}}</h6>
        @endif

        @error('name')
            <h6 class="alert alert-danger">{{'Introduce una categoría'}}</h6>
        @enderror
        
        <div class="mb-3">
          <label for="tarea" class="form-label">Nombre de la categoría</label>
          <input type="text" class="form-control" name="name" value="{{$category->name}}">
        </div>
        <div class="mb-3">
            <label for="tarea" class="form-label">Color de la categoría</label>
            <input type="color" class="form-control" name="color">
        </div>
        <button type="submit" class="btn btn-primary">Actualiza categoría</button>
    </form>

    <div>
        @if ($category->tareas->count() > 0)
            @foreach ($category->tareas as $tareas)
        <div class="row py-1">
            <div class="col-md-9 d-flex align-items-center">
                <a class="d-flex align-items-center gap-2" href="{{ route('app-edit', ['id' => $tareas->id]) }}">{{ $tareas->titulo }}</a>
            </div>

            <div class="col-md-3 d-flex justify-content-end">
                <form action="{{ route('categories.destroy', [$tareas->id]) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger btn-sm"> Eliminar </button>    
                </form>
            </div>

        </div>
        
            @endforeach

        @else

        No hay Tareas para esta categoría

        @endif
    </div>
    </div>
</div>

@endsection