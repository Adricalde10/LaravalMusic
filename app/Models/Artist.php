<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Artist extends Model
{
    //
    use HasFactory;
    protected $table = 'artist';
    protected $fillable = ['user_id', 'song_id'];
}
