@extends('layouts.base')

@section('content')

@role('Admin')
    SOC ADMIIIIN
@endrole
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Songs</h2>
        </div>
        <div>
            <a href="{{route('songs.create')}}" class="btn btn-primary">Crear tarea</a>
        </div>
    </div>

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Titulo</th>
                <th>Duracion</th>
                <th>Data de llençament</th>
                <th>Album</th>
                <th>Acción</th>
            </tr>
            @foreach ($songs as $song)
                <tr>
                    <td class="fw-bold">{{$song->Durada}}</td>
                    <td>{{$song->Titol}}</td>
                    <td>
                        {{$song->Data_llançament}}
                    </td>
                    <td>
                        <span class="badge bg-warning fs-6"><$song->album->Nom</span>
                    </td>
                    <td>
                        <a href="{{route('songs.edit', $song)}}" class="btn btn-warning">Editar</a>

                        <form action="{{route('songs.destroy', $song)}}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$songs->links()}}
    </div>
</div>
@endsection