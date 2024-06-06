<?php

namespace App\Livewire\Accountant;

use Illuminate\Support\Facades\DB;
use App\Services\RegisterInventoryService;


class RegisterInventory extends CommonRegister
{
    public $book_type = 'inventory';

    public $income_record_number;
    public $record_number;

    public $section;
    public $sections;
    public $storage_groups = [];
    public $fund;

    public $object_location;
    public $object_date;
    public $object_description;

    public $totalStep = 3;

    public $transferInfo = false;
    public $transferInfoDisabled = false;
    public $restorationTypes;

    public function __construct() {
        parent::__construct();

        $this->service = new RegisterInventoryService($this);
        $this->storage_groups = $this->service->getStorageGroups();
    }

    public function mount() {

        parent::mount();

        if(!$this->obj_id && $this->obj_id = intval(request()->get('id'))) {

            $state = $this->service->getProcessState();
            if($state == $this->book_type.'-book-complete' || $state == 'complete') {
                redirect('/cabinet/accountant'); // need show denied error ?
            }
            if($state == 'inventory-book-draft') { //  || $this->transferInfo
                $this->service->loadDraft($this->obj_id);
            }
            $record = $this->service->getIncomeBookRecord();
            $this->act_doc_num = $record->record_number;
            $this->fund = $this->service->getIncomeBookFund($record->book_id);
            $this->sections = $this->service->getSections();
            $this->restorationTypes = config('options.restoration_type');
        } else {
            abort(404);
        }
    }

    public function changeStorageGroups() {

        $this->service->getCurrentInventoryBook($this->varbook_code);
        $validated = $this->validate(
            $this->service->validatorsMultiPage[1],
            $this->service->validatorsMsgMultiPage[1],
        );
    }

    public function changeTransferInfo() {

        $this->transferInfo = !$this->transferInfo;

        if($this->transferInfo) 
            $this->service->copyFromIncome($this->obj_id);
    }

    public function save_complete() {

        if($this->update('complete')) {

            $this->dispatch('closeSaveCompleteModal');

            if($this->have_metals || $this->have_jewelry) {
                redirect('/cabinet/accountant/register-special?id='.$this->obj_id);
            } else {
                redirect('/cabinet/accountant');
            }
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

            // запис руху предмета
            $this->service->upsertObjectMovement();

            // оновлюємо додаткові необов'язкові документи
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
            'locationTypes' => config('options.location_types'),
            'storage_groups' => $this->storage_groups,
            'sections' => $this->sections,
            'fund' => $this->fund,
        ]);
    }
}

