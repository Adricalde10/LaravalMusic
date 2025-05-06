<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
use Spatie\Permission\Middleware\RoleMiddleware;

// Rutas públicas (accesibles sin estar logueado)
Route::get('/', function () {
    return view('welcome');
});



Route::get('/artists/{songId}', [ArtistController::class, 'index'])->name('artist.index');
Route::post('/songs/{songId}/apply-artist/{userId}', [SongController::class, 'applyArtist'])->name('song.applyArtist');
Route::post('/song/{songId}/apply-artist/{userId}', [SongController::class, 'apply'])->name('song.apply');


// Ruta del índice de canciones (pública, sin necesidad de login)
Route::resource('songs', SongController::class)->except(['show']);

Route::resource('albums', AlbumController::class);





// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

// Solo los usuarios con rol "Admin" pueden crear canciones
Route::middleware([RoleMiddleware::class . ':Admin'])->group(function () {
    Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');
    Route::get(('/albums/create'), [AlbumController::class, 'create'])->name('albums.create');
    Route::get(('/songs/{song}/edit'), [SongController::class, 'edit'])->name('songs.edit');
    Route::get(('/albums/{album}/edit'), [AlbumController::class, 'edit'])->name('albums.edit');
    Route::put('/albums/{album}', [AlbumController::class, 'update'])->name('albums.update');
    

    Route::resource('songs', SongController::class)->except(['index', 'show']);  // Proteger rutas excepto 'index' y 'show'
    Route::resource('albums', AlbumController::class)->except(['index', 'show']);  // Proteger rutas excepto 'index' y 'show'
});

// Rutas de álbumes
// Carga de rutas de autenticación (login, register)
require __DIR__.'/auth.php';
