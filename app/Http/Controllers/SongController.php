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

        $user = User::find(1);
        $songs = $user ? $user->songs : collect();
        
        foreach ($songs as $song) {
            echo $song->Titol;
        }
        //
        // $user = User::create([
        //      'name' => 'Admin',
        //      'email' => 'admin@site.com',
        //      'username' => 'admin',
        //      'password' => bcrypt('admin123'),
        // ]);


        // $user2 = User::create([
        //     'name' => 'Artist',
        //     'email' => 'artist@site.com',
        //     'username' => 'artist',
        //     'password' => bcrypt('artist123'),
        // ]);
            //  Permission::create(['name' => 'create-users']);
            //  Permission::create(['name' => 'edit-users']);
            //  Permission::create(['name' => 'delete-users']);
    
            //  Permission::create(['name' => 'create-songs']);
            //  Permission::create(['name' => 'edit-songs']);
            //  Permission::create(['name' => 'delete-songs']);
            //  Permission::create(['name' => 'is_admin']);
            //  Permission::create(['name' => 'is_artist']);
            
          // Create roles and assign existing permissions
            //  $adminRole = Role::create(['name' => 'Admin']);
            //  $artistRole = Role::create(['name' => 'Artist']);
    
        //      $adminRole->givePermissionTo([
        //          'create-users',
        //          'edit-users',
        //          'delete-users',
        //          'create-songs',
        //          'edit-songs',
        //          'delete-songs',
        //          'is_admin',
        //          'is_artist',
        //      ]);
    
        //      $artistRole->givePermissionTo([
        //          'create-songs',
        //          'edit-songs',
        //          'delete-songs',
        //          'is_artist',
        //      ]);
        //  dd($adminRole);
    
        //$user = User::find(1);
        $user->assignRole('Admin');
        //$user->assignRole('Artist');
            
        
        $user = User::find(1);
        $songs = $user ? $user->songs : collect();
        
            // Pasar las canciones a la vista
        //return view('indexsongs', ['songs' => $songs]);
        
        
         
    
        $albums = Album::all();
        $songs = Song::with('album')->paginate(10);
        
        return view('indexsongs', ['songs' => $songs, 'users' => User::all()]);
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
        $song = Song::findOrFail($id);
        $users = User::all(); // o con alguna condición: ->where('role', 'artist')
    
        return view('songs.show', compact('song', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song): View
    {
        //
        return view('editsongs', ['song' => $song], ['albums' => album::all()]);
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        //
        
        $song->update($request->all());

        return redirect()->route('songs.index')->with('success', 'Tarea actualizada correctamente');
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
    

    public function apply($songId, $userId)
    {
        // Buscar la canción por su ID
        $song = Song::findOrFail($songId);
        $user = User::findOrFail($userId);
        
        $song->users()->syncWithoutDetaching([$user->id]);
        return redirect()->route('songs.index');
    }



    
}
