<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Museum;
use Livewire\Attributes\On; 


class StaffList extends Component
{
    public $museum_code, $museum_name, $museum_type, $museum_description, $museum_address, $museum_contacts;
    public $upd_museum_code, $upd_museum_name, $upd_museum_type, $upd_museum_description, $upd_museum_address, $upd_museum_contacts, $m_id;

    #[On('refresh-list')]
    public function refresh() {
        $this->dispatch('refreshDatatable');
    }
    
    public function render()
    {
        return view('livewire.admin.staff-list', [
            'museums' => Museum::orderBy('museum_name', 'asc')->get(),
        ]);
    }

    #[On('openAddModal')]
    public function openAddModal() {
        $this->email = '';
        $this->name = '';
        $this->email = '';
    }

    #[On('openEditModal')]
    public function openEditModal($id) {
        $item = Museum::find($id);

        $this->m_id = $item->id;
        $this->upd_email = $this->email;
        $this->upd_name = $this->name;
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
