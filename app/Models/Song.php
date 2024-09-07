<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['name', 'artist', 'genre'];

    // Define the relationship with the Playlist model
    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_song');
    }
}
