<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use Livewire\Attributes\On; 
use App\Models\Searcher;
use App\Services\RegisterService;
use DB;


class Search extends Component
{
    public $query;
    public $record_id;
    public $record_number;
    public $obj_id;
    public $obj_name;
    public $descr_author;
    public $descr_description;
    public $descr_sizes;
    public $descr_materials;

    public $movements=[];
    public $parent;
    public $isQueryChanged=false; // use for destroy
    public $prevQuery;


    public function mount() {
        //$this->parent = $this;
    }

    public function render()
    {
        return view('livewire.employee.search');
    }

    public function search()
    {
        if($this->isQueryChanged = ($this->query != $this->prevQuery)) {
            $this->refresh();
        }
    }

    #[On('openInfoSearcherRecordModal')]
    public function openInfoSearcherRecordModal($id, $query) {
        DB::statement("SET settings.query = '{$query}'");
        if($item = Searcher::find($id)) {
            $this->record_id = $item->record_id;
            $this->record_number = $item->record_number;
            $this->obj_id = $item->obj_id;
            $this->obj_name = $item->obj_name;
            $this->descr_description = $item->descr_description;
            $this->descr_author = $item->descr_author;
            $this->descr_sizes = $item->descr_sizes;
            $this->descr_materials = $item->descr_materials;

            $service = new RegisterService($this);
            $service->getObjectMovements();
        }
    }

    #[On('closeInfoSearcherRecordModal')]
    public function closeInfoSearcherRecordModal() {
        $this->record_id = null;
        $this->record_number = null;
        $this->obj_id = null;
        $this->obj_name = null;
        $this->descr_description = null;
        $this->descr_author = null;
        $this->descr_sizes = null;
        $this->descr_materials = null;
    }

    #[On('changeQuery')]
    public function changeQuery() {
        $this->isQueryChanged = ($this->query != $this->prevQuery);
        $this->prevQuery = $this->query;
    }

    #[On('refresh-list')]
    public function refresh() {
        $this->dispatch('refreshDatatable');
        //$this->emit('refreshDatatable');
    }
}

