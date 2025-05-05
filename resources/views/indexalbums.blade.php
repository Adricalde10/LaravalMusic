@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Albums</h2>
        </div>
        <div>
            <a href="{{route('songs.index')}}" class="btn btn-primary">Caçons</a>
        </div>
        <div>
            @role('Admin')
                <a href="{{route('albums.create')}}" class="btn btn-primary">Crear Album</a>
            @endrole
        </div>
    </div>

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Nom</th>

            </tr>
            @foreach ($albums as $album)
                <tr>
                    <td class="fw-bold">{{$album->Nom}}</td>
                    
                    <td>
                        @role('Admin')
                            <a href="{{route('albums.edit', $album)}}" class="btn btn-warning">Editar</a>
                        @endrole
                        <form action="{{route('albums.destroy', $album)}}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                        @role('Admin')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        @endrole
                        @role('Admin')
                            <button type="submit" class="btn btn-danger">Cançons</button>
                        @endrole
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$albums->links()}}
    </div>
</div>
@endsection