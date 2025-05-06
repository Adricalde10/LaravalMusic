@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <h2 class="text-white">Usuarios (Artistas)</h2>
    </div>

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <thead>
                <tr class="text-secondary">
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('song.apply', ['songId' => $song->id, 'userId' => $user->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning">Asignar Artista</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
