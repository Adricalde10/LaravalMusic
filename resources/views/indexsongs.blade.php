@extends('layouts.base')

@section('content')


<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Songs</h2>
        </div>
        <div>
            @role('Admin')
            <a href="{{route('songs.create')}}" class="btn btn-primary">Crear Canço</a>
            @endrole
        </div>
        <div>
            <a href="{{route('albums.index')}}" class="btn btn-primary">Albums</a>
        </div>
    </div>
    

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Duracion</th>
                <th>Titulo</th>
                <th>Data de llençament</th>
                <th>Album</th>
                <th>Artistas</th>
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
                        <span class="badge bg-warning fs-6">{{$song->album->Nom ?? 'Sin álbum'}}</span>
                    </td>
                    <td>
                        <span class="badge bg-warning fs-6">
                            @foreach ($song->users as $user)
                                {{ $user->name }},
                            @endforeach
                            {{-- Si no hay usuarios, mostrar "Sin usuarios" --}}
                            @if($song->users->isEmpty()) 
                                Sin usuarios
                            @endif
                        </span>
                        <a href="{{route('artist.index')}}" class="btn btn-warning">Añadir artista</a>
                        <!-- -->

                    </td>
                    <td>
                    @role('Admin')
                        <a href="{{route('songs.edit', $song)}}" class="btn btn-warning">Editar</a>
                    @endrole
                        <form action="{{route('songs.destroy', $song)}}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            @role('Admin')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            @endrole
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$songs->links()}}
    </div>
</div>
@endsection