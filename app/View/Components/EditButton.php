<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditButton extends Component
{
    public $route;
    public $id;

    public function __construct($route, $id)
    {
        $this->route = $route;
        $this->id = $id;
    }

    public function render()
    {
        return view('components.edit-button');
    }
}
