<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cabinet extends Component
{
    function __construct()
    {
        //
    }

    public function render()
    {
        return view('livewire.admin.cabinet');
    }
}
