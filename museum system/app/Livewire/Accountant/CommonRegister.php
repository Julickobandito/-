<?php

namespace App\Livewire\Accountant;

use Illuminate\Support\Facades\DB;
use App\Livewire\CommonComponent;
use App\Services\RegisterIncomeService;


class CommonRegister extends CommonComponent
{
    public $act_doc_num, $act_doc_date, $proto_doc_num, $proto_doc_date;
    public $obj_id=0, $obj_name, $record_number, $record_registered;
    public $author, $description, $section, $amount=1, $materials, $sizes, $have_metals=false, $have_jewelry=false, $technique, $creation, 
            $restoration, $residence, $discovery, $condition, $source_income, $income_method, $evaluation_price, $insurance_price;

    public $varbook_id; 
    public $varbook_code; 
    public $book_id;
    public $book_code;
    public $book_type;
    public $book_description;

    // documents
    public $main_docs = [];
    public $docs = [];
    public $document_count = 1;

    // form pages
    public $currentStep = 1;
    public $totalStep;
    public $stepCompleted = false;

    public $models = [];


    public function __construct() {
        parent::__construct();
    }

    public function mount() {

        $this->currentStep = 1;
    }

    public function increaseStep() {
        $validate = $this->validate(
            $this->service->validatorsMultiPage[$this->currentStep], 
            $this->service->validatorsMsgMultiPage[$this->currentStep]
        );
        ++$this->currentStep;
    }

    public function decreaseStep() {
        --$this->currentStep;
    }

    #[On('addDocument')]
    public function addDocument() {
        $this->docs[] = ['type'=>'','num'=>'','date'=>'','is_disabled'=>''];
        $this->document_count = count($this->docs);
    }

    #[On('removeDocument')]
    public function removeDocument() {
        unset($this->docs[count($this->docs)-1]);
        $this->document_count = count($this->docs);
    }

    public function save_draft() {

        if($this->update('draft')) {
            $this->dispatch('closeSaveDraftModal');
            redirect('/cabinet/accountant');
        }
    }

    public function save_complete() {

        if($this->update('complete')) {
            $this->dispatch('closeSaveCompleteModal');
            redirect('/cabinet/accountant');
        }
    }

    protected function update($from) {

        $validated = $this->validate(
            $this->service->validatorsMultiPage[1],
            $this->service->validatorsMsgMultiPage[1],
        );

        $validated = $this->validate(
            $this->service->validatorsMultiPage[2],
            $this->service->validatorsMsgMultiPage[2],
        );

        DB::transaction(function () use($from) {

            // майстер об'єкт - музейний предмет
            $obj = $this->service->upsertMuseumObject();

            // запис в томі книги надходжень
            $this->service->upsertBookRecord();

            // опис предмету
            $descr = $this->service->upsertMuseumObjDescr($from);

            // акт прийому-передачі
            $this->service->upsertMainDoc('act-delivery-acceptance', 'act');
        
            // протокол засідання
            $this->service->upsertMainDoc('protocol-meeting', 'proto');

            // оновлюємо додаткові необов'язкові документи
            $this->service->upsertAuxDocs();

            // оновлюємо дані про процесс регістрації предмета
            $this->service->upsertProcess($from);

        });
        return true;
    }

}

