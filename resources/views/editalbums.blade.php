@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Actualizar Tarea</h2>
        </div>
        <div>
            <a href="{{route('albums.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    <form action="{{ route('albums.update', $album) }}" method="POST">
        @csrf
        @method('PUT') <!-- Spoof the PUT method for updating -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nom:</strong>
                    <input type="text" name="Nom" class="form-control" placeholder="Tarea" value="{{ $album->Nom }}">
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection
