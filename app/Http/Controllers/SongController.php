<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
Use App\Models\Album;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        // $user = User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@site.com',
        //     'username' => 'admin',
        //     'password' => bcrypt('admin123'),
        // ]);


        // $user2 = User::create([
        //     'name' => 'Artist',
        //     'email' => 'artist@site.com',
        //     'username' => 'artist',
        //     'password' => bcrypt('artist123'),
        // ]);
    //         Permission::create(['name' => 'create-users']);
    //         Permission::create(['name' => 'edit-users']);
    //         Permission::create(['name' => 'delete-users']);
    
    //         Permission::create(['name' => 'create-songs']);
    //         Permission::create(['name' => 'edit-songs']);
    //         Permission::create(['name' => 'delete-songs']);
    //         Permission::create(['name' => 'is_admin']);
    //         Permission::create(['name' => 'is_artist']);
            
    //         // Create roles and assign existing permissions
    //         $adminRole = Role::create(['name' => 'Admin']);
    //         $artistRole = Role::create(['name' => 'Artist']);
    
    //         $adminRole->givePermissionTo([
    //             'create-users',
    //             'edit-users',
    //             'delete-users',
    //             'create-songs',
    //             'edit-songs',
    //             'delete-songs',
    //             'is_admin',
    //             'is_artist',
    //         ]);
    
    //         $artistRole->givePermissionTo([
    //             'create-songs',
    //             'edit-songs',
    //             'delete-songs',
    //             'is_artist',
    //         ]);
    // dd($adminRole);
    
        $user = User::find(1);
        $user->assignRole('Admin');
        //$user->assignRole('Artist');
            
       
         
    
        $albums = Album::all();
        $songs = Song::latest()->paginate(3);
        return view('indexsongs', ['songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('createsongs', ['albums' => album::all()]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'Titol' => 'required',
            'Durada' => 'required',
            'Data_llançament' => 'required',
            'Album_id' => 'required'
        ]);
       Song::create($request->all());
       return redirect()->route('songs.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song): View
    {
        //
        return view('editsongs', ['song' => $song]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        //
        
        $song->update($request->all());
        return redirect()->route('songs.indexsongs')->with('success', 'Tarea actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song): redirectResponse
    {
        //
        $song->delete();
        return redirect()->route('songs.index')->with('success', 'Tarea eliminada correctamente');
    }
}
