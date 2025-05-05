<?php

namespace App\Http\Controllers;

use App\Models\Artist;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\User;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($songId)
    {
        // Obtener los usuarios con el rol de 'Artist'
        $users = User::role('Artist')->get();
    
        // Pasar los usuarios y el ID de la canción a la vista
        return view('indexartistes', compact('users', 'songId'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        //
    }

    public function showArtists()
{
    // Obtener todos los usuarios (sin filtrar por rol)
    $users = User::all();  // O puedes usar paginate() si prefieres paginación
    
    // Pasar los usuarios a la vista
    return view('indexartistes', compact('users'));  // La variable aquí es 'users'
}
public function apply($songId, $userId)
{
    $song = Song::findOrFail($songId);
    $song->users()->attach($userId); // o syncWithoutDetaching si no quieres duplicados

    return redirect()->route('songs.index'); // vuelve al index de canciones
}

    
}
