<?php

namespace App\Services;

use Livewire\Component;
use App\Models\MuseumObjDescription;
use App\Models\MuseumObject;
use App\Models\Document;
use App\Models\VarietyBook;
use App\Models\BookRecord;
use App\Models\Book;
use App\Models\Process;


class RegisterIncomeService extends RegisterService {

    public $validatorsMultiPage = [
        1 => [
            'main_docs.act.num' => 'required',
            'main_docs.act.date' => 'required',
            'main_docs.proto.num' => 'required',
            'main_docs.proto.date' => 'required',
        ],
        2 => [
            'obj_name' => 'required',
            'record_number' => 'required',
            'record_registered' => 'required',
        ],
    ];
    public $validatorsMsgMultiPage = [];

    public function __construct(Component $component) {
        parent::__construct($component);

        $this->validatorsMsgMultiPage = [
            1 => [
                'main_docs.act.num.required' => config('msg.field-required'),
                'main_docs.act.date.required' => config('msg.field-required'),
                'main_docs.proto.num.required' => config('msg.field-required'),
                'main_docs.proto.date.required' => config('msg.field-required'),
            ],
            2 => [
                'obj_name.required' => config('msg.field-required'),
                'record_number.required' => config('msg.field-required'),
                'record_registered.required' => config('msg.field-required'),
            ]
        ];
    }

    public function loadDraft(int $id) {
        parent::loadDraft($id);
        // акт прийому-передачі
        $act = Document::where(['obj_id' => $id, 'doc_type' => 'act-delivery-acceptance', 'doc_primary' => true])->firstOrFail();
        $this->component->main_docs['act']['num'] = $act->doc_num;
        $this->component->main_docs['act']['date'] = $act->doc_date;
    
        // протокол засідання
        $proto = Document::where(['obj_id' => $id, 'doc_type' => 'protocol-meeting', 'doc_primary' => true])->firstOrFail();
        $this->component->main_docs['proto']['num'] = $proto->doc_num;
        $this->component->main_docs['proto']['date'] = $proto->doc_date;
    }

    public function upsertBookRecord() {
        if(!$bookrec = BookRecord::where(['obj_id' => $this->component->obj_id, 'record_type' => $this->component->book_type])->first()) {
            $bookrec = new BookRecord();
        }
        $bookrec->obj_id = $this->component->obj_id;
        $bookrec->book_id = $this->component->book_id;
        $bookrec->record_type = $this->component->book_type;
        $bookrec->record_number = $this->component->record_number; 
        $bookrec->record_registered = $this->component->record_registered;
        $bookrec->creator_user_id = $this->component->user_id;
        $bookrec->editor_user_id = $this->component->user_id;
        $bookrec->save();

        return $bookrec;
    }

    public function upsertMuseumObjDescr($from) {
        if(!$descr = MuseumObjDescription::where(['obj_id' => $this->component->obj_id, 'descr_type' => $this->component->book_type])->first()) {
            $descr = new MuseumObjDescription();
        }
        $descr->obj_id = $this->component->obj_id;
        $descr->descr_type = $this->component->book_type;
    
        $descr->descr_author = $this->component->author;
        $descr->descr_description = $this->component->description;
        $descr->descr_amount = $this->component->amount;
        $descr->descr_materials = $this->component->materials;
        $descr->descr_sizes = $this->component->sizes;
        $descr->descr_have_metals = $this->component->have_metals ? true : false;
        $descr->descr_have_jewelry = $this->component->have_jewelry ? true : false;
        $descr->descr_technique = $this->component->technique;
        $descr->descr_about_creation = $this->component->creation;
        $descr->descr_about_discovery = $this->component->discovery;
        $descr->descr_about_residence = $this->component->residence;
        $descr->descr_about_creation = $this->component->creation;
        $descr->descr_condition = $this->component->condition;
        $descr->descr_source = $this->component->source_income;
        $descr->descr_income_method = $this->component->income_method;
        $descr->descr_estimated_value = $this->component->evaluation_price;
        $descr->descr_insurance_value = $this->component->insurance_price;

        $descr->descr_draft = ($from == 'draft');
        $descr->save();

        return $descr;
    }

    public function upsertProcess($from) {
        if(!$proc = Process::where(['obj_id' => $this->component->obj_id])->first()) {
            $proc = new Process();
            $proc->obj_id = $this->component->obj_id;
        }
        $proc->user_id = $this->component->user_id;
        if($from =='draft') {
            $proc->process_state = $this->component->book_type.'-book-draft';
        } else {
            $process_state = $this->component->book_type.'-book-complete';
            $proc->process_state = $process_state;
        }
        $proc->process_edit_date = date('Y-m-d');

        $proc->save();
    }
}