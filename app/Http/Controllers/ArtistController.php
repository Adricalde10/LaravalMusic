<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Song;
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
        // Buscar la canción por su ID
        $song = Song::findOrFail($songId);  // Aquí obtenemos la canción
    
        // Obtener los usuarios asociados a esa canción
        $users = User::all();  // O puedes hacer una relación si necesitas solo ciertos usuarios
    
        // Pasar los datos a la vista
        return view('indexartistes', compact('song', 'users'));
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
}
