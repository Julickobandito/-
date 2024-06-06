<?php

namespace App\Livewire\Accountant;

use App\Livewire\CommonComponent;


class DraftList extends CommonComponent
{
    public function render()
    {
        session(['user_id' => $this->user_id]);
        session(['museum_id' => $this->museum_id]);

        return view('livewire.accountant.draft-list');
    }
}
