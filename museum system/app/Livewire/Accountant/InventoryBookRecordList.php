<?php

namespace App\Livewire\Accountant;

use App\Livewire\CommonComponent;
use App\Services\RegisterService;
use App\Services\RegisterInventoryService;
use App\Models\InventoryBookRecord;
use App\Models\VarietyBook;
use Livewire\Attributes\On; 
use DB;


class InventoryBookRecordList extends CommonComponent
{
    public $book_id, $book_code, $record_id, $record_number, $obj_name, $obj_id,
    $record_registered, $record_edit_date, $descr_amount, $descr_author, $descr_materials, 
    $descr_source, $descr_income_method, $descr_estimated_value, $descr_insurance_value,
    $descr_description, $descr_condition, $descr_restoration, $descr_sizes,
    $act_doc_num, $act_doc_date, $proto_doc_num, $proto_doc_date,
    $descr_about_residence, $descr_about_discovery, $descr_about_creation, 
    $descr_technique, $descr_have_jewelry, $descr_have_metals,
    $inv_record_num, $spc_record_num, $varbook_descr;

    public $docs=[];
    public $movements=[];

    public $book_type = 'inventory';
    public $varbook_type;

    public function __construct() {
    }

    public function render()
    {
        return view('livewire.accountant.inventory-book-record-list');
    }

    public function mount() {
        $filters = request()->query();
        if(isset($filters['book_id'])) {
            $this->book_id = $filters['book_id'];
            $service = new RegisterService($this);
            $book = $service->getBook($this->book_id);
            $this->book_code = $book->book_code;

            if(isset($filters['varbook_code'])) {
                if($varbook = VarietyBook::where('varbook_code', $filters['varbook_code'])->first()) {
                    $this->varbook_code = $varbook->varbook_code;
                    $this->varbook_descr = $varbook->varbook_descr;
                }
            }
        }
    }

    #[On('openInfoBookRecordModal')]
    public function openInfoBookRecordModal($id) {
        if($item = InventoryBookRecord::find($id)) {
            $this->book_code = $item->book_code;
            $this->record_number = $item->record_number;
            $this->obj_id = $item->obj_id;
            $this->obj_name = $item->obj_name;
            $this->record_registered = $item->record_registered;
            $this->record_edit_date = $item->record_edit_date; 
            $this->descr_amount = $item->descr_amount; 
            $this->descr_author = $item->descr_author; 
            $this->descr_materials = $item->descr_materials; 
            $this->descr_estimated_value = $item->descr_estimated_value; 
            $this->descr_insurance_value = $item->descr_insurance_value;
            $this->descr_description = $item->descr_description; 
            $this->descr_sizes = $item->descr_sizes; 
            $this->descr_restoration = $item->descr_restoration;
            $this->descr_about_residence = $item->descr_about_residence;
            $this->descr_about_discovery = $item->descr_about_discovery;
            $this->descr_about_creation = $item->descr_about_creation;
            $this->descr_have_jewelry = $item->descr_have_jewelry; 
            $this->descr_have_metals = $item->descr_have_metals;
            $this->descr_technique = $item->descr_technique;

            $this->descr_source = $item->descr_source; 
            $this->descr_income_method = config('options.income_method_type')[$item->descr_income_method]; 
            $this->descr_condition = config('options.condition_type')[$item->descr_condition]; 

            $this->inv_record_num = $item->inv_record_num; 
            $this->spc_record_num = $item->spc_record_num;

            $this->act_doc_num = $item->act_doc_num; 
            $this->act_doc_date = $item->act_doc_date; 
            $this->proto_doc_num = $item->proto_doc_num; 
            $this->proto_doc_date = $item->proto_doc_date;

            $service = new RegisterService($this);
            $service->getDocs($this->obj_id);
            $service->getObjectMovements();
        }
    }

    #[On('refresh-list')]
    public function refresh() {
        DB::statement("SET settings.book_id = {$this->book_id}");
        $this->dispatch('refreshDatatable');
    }

}
