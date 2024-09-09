<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SongsTable extends Component
{
    public $playlist;

    public function __construct($playlist)
    {
        $this->playlist = $playlist;
    }

    public function render()
    {
        return view('components.songs-table');
    }
}
