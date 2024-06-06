<?php

namespace App\Livewire\Accountant;

use App\Services\RegisterIncomeService;


class RegisterIncome extends CommonRegister
{
    public $varbook_type = 'main'; 
    public $varbook_code = '101';
    public $book_type = 'income';

    public $document_count = 1;

    public $totalStep = 3;

    
    public function __construct() {
        parent::__construct();

        $this->service = new RegisterIncomeService($this);

        //$this->service->getCurrentIncomeBook(101);
        $this->setVarbookType('main');
    }

    public function mount() {

        parent::mount();

        if(!$this->obj_id && $this->obj_id = intval(request()->get('id'))) {

            $state = $this->service->getProcessState();
            if($state == $this->book_type.'-book-complete') {
                redirect('/cabinet/accountant'); // need show denied error ?
            }
            if($state == $this->book_type.'-book-draft') {
                $this->service->loadDraft($this->obj_id);
            }
        }
    }

    #[On('setVarbookType')]
    public function setVarbookType($type) {
        switch($type) {
            case 'main':
                $this->varbook_code = '101';
                break;
            case 'additional':
                $this->varbook_code = '102';
                break;
            default: 
                return false;
        }
        $this->varbook_type = $type;
        $this->service->getCurrentIncomeBook($this->varbook_code);
    }

    public function save_complete() {

        if($this->update('complete')) {
            $this->dispatch('closeSaveCompleteModal');
            redirect('/cabinet/accountant/register-inventory?id='.$this->obj_id);
        }
    }

    public function render()
    {   
        return view('livewire.accountant.register-income', [
            'condition_types' => config('options.condition_type'),
            'income_method_types' => config('options.income_method_type'),
            'doc_types' => config('options.doc_types'),
        ]);
    }
}

