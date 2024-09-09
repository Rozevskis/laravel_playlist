<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RemoveSongButton extends Component
{
    public $route;
    public $playlistId;
    public $songId;

    public function __construct($route, $playlistId, $songId)
    {
        $this->route = $route;
        $this->playlistId = $playlistId;
        $this->songId = $songId;
    }

    public function render()
    {
        return view('components.remove-song-button');
    }
}
