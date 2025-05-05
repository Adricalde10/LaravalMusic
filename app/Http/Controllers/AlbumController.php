<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():view
    {
        //
        $albums = Album::latest()->paginate(3);
        return view('indexalbums', ['albums' => $albums]);
    }
        //


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('createalbums');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Album::create($request->all());
        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album) : View
    {
        //
        
        
    
        //
        return view('editalbums', ['album' => $album, 'albums' => Album::all()]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        //
        $album->update($request->all());

        return redirect()->route('albums.index')->with('success', 'Tarea actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        //
        $album->delete();
        return redirect()->route('albums.index')->with('success', 'Tarea eliminada correctamente');
    }
}
