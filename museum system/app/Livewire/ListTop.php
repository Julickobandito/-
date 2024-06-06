<?php

namespace App\Livewire;

use Livewire\Component;

class ListTop extends Component
{
    public $title;
    public $button;

    public function render()
    {
        return view('livewire.list-top');
    }
}
