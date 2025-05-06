<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Song extends Model
{
    //
    use HasFactory;
    protected $table = 'songs';
    protected $fillable = ['Titol', 'Durada', 'Data_llançament', 'Album_id', ];
    public function album()
    {
        return $this->belongsTo(Album::class, 'Album_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'artist');
    }
    

}
