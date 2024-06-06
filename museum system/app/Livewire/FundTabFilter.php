<?php

namespace App\Livewire;

use Livewire\Component;
//use Rappasoft\LaravelLivewireTables\Views\Traits\IsExternalFilter;


class FundTabFilter extends Component
{
    //use IsExternalFilter;

    #[Modelable]
    public $tab = [];
    public $main = false;
    public $additional = false;

    public $filterKey = '';

    public function render()
    {
        return view('livewire.fund-tab-filter');
    }
}
