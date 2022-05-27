@extends('app')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        @if (session('success'))
            <h6 class="alert alert-success">{{ session('success')}}</h6>
        @endif

        @error('name')
            <h6 class="alert alert-danger">{{'Introduce una categoría'}}</h6>
        @enderror
        
        <div class="mb-3">
          <label for="tarea" class="form-label">Nombre de la categoría</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label for="tarea" class="form-label">Color de la categoría</label>
            <input type="color" class="form-control" name="color">
          </div>
        <button type="submit" class="btn btn-primary">Crear nueva categoría</button>
    </form>

    <div>
        @foreach ($categories as $item)
            <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center">
                    <a class="d-flex align-items-center gap-2" href="{{ route('categories.show', ['category' => $item->id]) }}">
                        <span class="color-container" style="background-color:{{ $item->color }}"></span> {{ $item->name }}
                    </a>
                </div>

            <!-- Button trigger modal -->
                <div class="col-md-3 d-flex justify-content-end">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{$item->id}}">Eliminar</button>
                </div>
            </div>
  
                    <!-- Modal -->
                    <div class="modal fade" id="modal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoría</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            Al elimnar la categoria <strong>{{ $item->name}}</strong> se eliminan todas las tareas asignadas a la misma.
                            ¿Está seguro que desea eliminar la categoría <strong>{{ $item->name }}</strong>?
                            </div>

                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <form action="{{ route('categories.destroy', ['category' => $item->id]) }}" method="POST ">
                                @method('DELETE')
                                @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
        @endforeach
        </div>
    </div>
</div>

@endsection