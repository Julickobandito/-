<?php

namespace App\Livewire\Accountant;

use Illuminate\Support\Facades\DB;
use App\Services\RegisterSpecialService;


class RegisterSpecial extends CommonRegister
{
    public $book_type = 'special';

    public $income_record_number;
    public $record_number;

    public $totalStep = 2;
    public $restorationTypes;
    public $jewelNames;
    public $metals = [];
    public $gems = [];


    public function __construct() {
        parent::__construct();

        $this->service = new RegisterSpecialService($this);
    }

    public function mount() {

        parent::mount();

        if(!$this->obj_id && $this->obj_id = intval(request()->get('id'))) {

            $state = $this->service->getProcessState();
            if($state == 'special-book-complete' || $state == 'complete') {
                redirect('/cabinet/accountant'); // need show denied error ?
            }
            $this->service->loadDraft($this->obj_id);

            $this->service->getCurrentInventoryBook('101');

            $record = $this->service->getIncomeBookRecord();
            $this->act_doc_num = $record->record_number;
            
            $this->jewelNames = config('options.jewel_name');

            $this->restorationTypes = config('options.restoration_type');
        } else {
            abort(404);
        }
    }

    public function addMetal() {
        $this->metals[] = ['name'=>'','mass'=>'','sample'=>''];
    }

    public function removeMetal() {
        unset($this->metals[count($this->metals)-1]);
    }

    public function addGem() {
        $this->gems[] = ['name'=>'','mass'=>'']; 
    }

    public function removeGem() {
        unset($this->gems[count($this->gems)-1]);
    }

    protected function update($from) {

        $validated = $this->validate(
            $this->service->validatorsMultiPage[1],
            $this->service->validatorsMsgMultiPage[1],
        );

        DB::transaction(function () use($from) {

            // запис в томі книги надходжень
            $this->service->upsertBookRecord();

            // оновлюємо дорогоцінні матеріали
            $this->service->upsertJewels();

            $this->service->upsertAuxDocs();

            // оновлюємо дані про процесс регістрації предмета
            $this->service->upsertProcess($from);
        });
        return true;
    }

    public function render()
    {   
        return view('livewire.accountant.register-'.$this->book_type, [
            'condition_types' => config('options.condition_type'),
            'income_method_types' => config('options.income_method_type'),
            'doc_types' => config('options.doc_types'),
        ]);
    }
}

