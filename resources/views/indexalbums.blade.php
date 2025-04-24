@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Albums</h2>
        </div>
        <div>
            <a href="{{route('albums.create')}}" class="btn btn-primary">Crear Album</a>
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
                        <a href="{{route('albums.edit', $album)}}" class="btn btn-warning">Editar</a>

                        <form action="{{route('albums.destroy', $album)}}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$albums->links()}}
    </div>
</div>
@endsection