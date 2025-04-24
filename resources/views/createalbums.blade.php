@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Crear Tarea</h2>
        </div>
        <div>
            <a href="{{route('albums.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    <form action="{{route('albums.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nom:</strong>
                    <input type="text" name="Nom" class="form-control" placeholder="Tarea" >
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
@endsection