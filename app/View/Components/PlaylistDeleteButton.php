<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PlaylistDeleteButton extends Component
{
    public $playlistId;

    public function __construct($playlistId)
    {
        $this->playlistId = $playlistId;
    }

    public function render()
    {
        return view('components.playlist-delete-button');
    }
}
