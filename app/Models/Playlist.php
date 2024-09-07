<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $fillable = ['name', 'tag'];

    // Define the relationship with the Song model
    public function songs()
    {
        return $this->belongsToMany(Song::class, 'playlist_song');
    }
}
