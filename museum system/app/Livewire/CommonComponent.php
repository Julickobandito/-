<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;   
use Auth;
use DB;


class CommonComponent extends Component
{
    public $user_id;
    public $museum_id;

    /**
     * Init common properties
     */
    public function __construct() {
        $user = request()->user();
        $this->user_id = $user->id;
        $this->museum_id = $user->museum_id;
        DB::statement("SET settings.user_id = {$user->id}");
        DB::statement("SET settings.museum_id = {$user->museum_id}");
    }
}
