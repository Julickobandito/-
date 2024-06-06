<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Museum;
use Livewire\Attributes\On; 


class MuseumList extends Component
{
    public $museum_code, $museum_name, $museum_type, $museum_description, $museum_address, $museum_contacts;
    public $upd_museum_code, $upd_museum_name, $upd_museum_type, $upd_museum_description, $upd_museum_address, $upd_museum_contacts, $m_id;

    #[On('refresh-list')]
    public function refresh() {
        $this->dispatch('refreshDatatable');
    }
    
    public function render()
    {
        return view('livewire.admin.museum-list', [
            //'items' => Museum::orderBy('museum_id', 'desc')->get(),
        ]);
    }

    #[On('openAddModal')]
    public function openAddModal() {
        $this->museum_code = '';
        $this->museum_name = '';
        $this->museum_type = '';
        $this->museum_description = '';
        $this->museum_address = '';
        $this->museum_contacts = '';
    }

    #[On('openEditModal')]
    public function openEditModal($id) {
        $item = Museum::find($id);

        $this->m_id = $item->museum_id;
        $this->upd_museum_code = $item->museum_code;
        $this->upd_museum_name = $item->museum_name;
        $this->upd_museum_type = $item->museum_type;
        $this->upd_museum_description = $item->museum_description;
        $this->upd_museum_address = $item->museum_address;
        $this->upd_museum_contacts = $item->museum_contacts;
    }

    public function save() {
        $validated = $this->validate([
            'museum_code' => 'required',
            'museum_name' => 'required',
            'museum_type' => 'required',
            'museum_description' => 'required',
            'museum_address' => 'required',
            'museum_contacts' => 'required',
        ]);
        $result = Museum::create($validated);

        if($result) {
            $this->dispatch('closeAddModal');
            $this->refresh();
        }
    }

    public function update() {

        $validated = $this->validate([
            'upd_museum_code' => 'required',
            'upd_museum_name' => 'required',
            'upd_museum_type' => 'required',
            'upd_museum_description' => 'required',
            'upd_museum_address' => 'required',
            'upd_museum_contacts' => 'required',
        ]);

        $result = Museum::find($this->m_id)->update([
            'museum_code' => $this->upd_museum_code,
            'museum_name' => $this->upd_museum_name,
            'museum_type' => $this->upd_museum_type,
            'museum_description' => $this->upd_museum_description,
            'museum_address' => $this->upd_museum_address,
            'museum_contacts' => $this->upd_museum_contacts,
        ]);

        if($result) {
            $this->dispatch('closeEditModal');
            $this->refresh();
        }
    }
}
