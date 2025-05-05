@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Editar Tarea</h2>
        </div>
        <div>
            <a href="{{route('songs.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>
   
    @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <strong>Por las chancas de mi madre!</strong> Algo fue mal..<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('songs.update', $song) }}" method="POST">
    @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Durada:</strong>
                    <input type="text" name="Durada" class="form-control" placeholder="Durada" value="{{$song->Durada}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Titol:</strong>
                    <textarea class="form-control" style="height:150px" name="Titol" placeholder="Titol">{{$song->Titol}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Fecha límite:</strong>
                    <input type="date" name="Data_llançament" class="form-control" value="{{$song->Data_llançament}}" id="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Estado (inicial):</strong>
                    <select name="Album_id" class="form-select" required>
                        <option value="">-- Selecciona un álbum --</option>
                        @foreach ($albums as $album)
                            <option value="{{$album->id}}" {{ $song->Album_id == $album->id ? 'selected' : '' }}>
                                {{$album->Nom}}
                            </option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection