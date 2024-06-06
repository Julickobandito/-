<?php

namespace App\Services;

use Livewire\Component;
use App\Models\MuseumObjDescription;
use App\Models\ObjectMovement;
use App\Models\MuseumObject;
use App\Models\Document;
use App\Models\VarietyBook;
use App\Models\BookRecord;
use App\Models\Book;
use App\Models\Process;


class RegisterService {

    protected $component;

    public $validatorsMultiPage;
    public $validatorsMsgMultiPage;

    public function __construct(Component $component) {
        $this->component = $component;
    }

    public function getProcessState() {
        $result = null;
        if($this->component->obj_id) {
            $proc = Process::where(['obj_id' => $this->component->obj_id])->firstOrFail();
            $result = $proc->process_state;
        }
        return $result;
    }

    public function getCurrentIncomeBook($varbook_code) {
        $varbook = VarietyBook::where('varbook_code', $varbook_code)->first();
        $this->component->varbook_id = $varbook->varbook_id;
        $this->component->varbook_code = $varbook_code;
        if($book = Book::where([
            'museum_id'=>$this->component->museum_id, 
            'book_type'=>'income', 
            'book_current'=>true, 
            'varbook_id'=>$varbook->varbook_id,
        ])->first()) {
            $this->component->book_code = $book->book_code;
            $this->component->book_id = $book->book_id;
        }
    }

    public function getIncomeBookFund($book_id) {
        $fund_type = '';
        $book = Book::where(['book_id' => $book_id])->firstOrFail();
        $varbook = VarietyBook::where('varbook_id', $book->varbook_id)->firstOrFail();
        if($varbook->varbook_code == '101') {
            $fund_type = 'main';
        }
        if($varbook->varbook_code == '102') {
            $fund_type = 'additional';
        }
        return $fund_type;
    }

    public function getBook($book_id) {
        return Book::where(['book_id' => $book_id])->firstOrFail();
    }

    public function upsertMuseumObject() {
        if(!$this->component->obj_id || !$obj = MuseumObject::where('obj_id', $this->component->obj_id)->first()) {
            $obj = new MuseumObject();
        }
        $obj->museum_id = $this->component->museum_id;
        $obj->obj_name = $this->component->obj_name;
        $obj->save();

        $this->component->obj_id = $obj->obj_id;

        return $obj;
    }

    public function upsertMainDoc($doc_type, $doc_type_short) {
        if(!$doc = Document::where(['obj_id' => $this->component->obj_id, 'doc_type' => $doc_type, 'doc_primary' => true])->first()){
            $doc = new Document();
        }
        $doc->obj_id = $this->component->obj_id;
        $doc->doc_type = $doc_type;
        $doc->doc_num = $this->component->main_docs[$doc_type_short]['num'];
        $doc->doc_date = $this->component->main_docs[$doc_type_short]['date'];
        $doc->doc_primary = true;
        $doc->save();

        return $doc;
    }

    public function upsertAuxDocs() {
        Document::where(['obj_id' => $this->component->obj_id, 'doc_primary' => false])->delete();

        // додаємо додаткові необов'язкові документи
        foreach($this->component->docs as $item) {
            $doc = new Document();
            $doc->obj_id = $this->component->obj_id;
            $doc->doc_type = $item['type'];
            $doc->doc_num = $item['num'];
            $doc->doc_date = $item['date'];
            $doc->doc_primary = false;
            $doc->save();
        }
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
            if($this->component->have_metals || $this->component->have_jewelry) {
                $process_state = $this->component->book_type.'-book-complete';
            } else {
                $process_state = 'complete';
            }
            $proc->process_state = $process_state;
        }
        $proc->process_edit_date = date('Y-m-d');

        $proc->save();
    }

    public function loadDraft(int $id) {
        $obj = MuseumObject::where('obj_id', $id)->firstOrFail();
        $this->component->museum_id = $obj->museum_id;
        $this->component->obj_name = $obj->obj_name;

        $this->component->models['obj'] = $obj;

        // запис в томі відповідної книги 
        if($bookrec = BookRecord::where(['obj_id' => $id, 'record_type' => $this->component->book_type])->first()) {
            $this->component->obj_id = $obj->obj_id;
            $this->component->book_id = $bookrec->book_id;
            $this->component->record_type = $bookrec->record_type;
            $this->component->record_number = $bookrec->record_number; 
            $this->component->record_registered = $bookrec->record_registered;

            $this->component->models['bookrec'] = $bookrec;
        }

        // опис предмету
        if($descr = MuseumObjDescription::where(['obj_id' => $id, 'descr_type' => $this->component->book_type])->first()) {
            $this->component->obj_id = $descr->obj_id;
        
            $this->component->author = $descr->descr_author;
            $this->component->description = $descr->descr_description;
            $this->component->section = $descr->section;
            $this->component->amount = $descr->descr_amount;
            $this->component->restoration = $descr->descr_restoration;
            $this->component->materials = $descr->descr_materials;
            $this->component->sizes = $descr->descr_sizes;
            $this->component->have_metals = $descr->descr_have_metals;
            $this->component->have_jewelry = $descr->descr_have_jewelry;
            $this->component->technique = $descr->descr_technique;
            $this->component->creation = $descr->descr_about_creation;
            $this->component->discovery = $descr->descr_about_discovery;
            $this->component->residence = $descr->descr_about_residence;
            $this->component->creation = $descr->descr_about_creation;
            $this->component->condition = $descr->descr_condition;
            $this->component->source_income = $descr->descr_source;
            $this->component->income_method = $descr->descr_income_method;
            $this->component->evaluation_price = $descr->descr_estimated_value;
            $this->component->insurance_price = $descr->descr_insurance_value;

            $this->component->from = $descr->descr_draft;

            $this->component->models['descr'] = $descr;
        }

        $this->getDocs($id);
    }

    public function getDocs(int $id) {
        // додаткові необов'язкові документи
        $this->component->document_count = 0;
        $docs = Document::where(['obj_id' => $id, 'doc_primary' => false])->get();
        foreach($docs as $idx=>$item) {
            $this->component->docs[$idx]['type_name'] = config('options.doc_types')[$item->doc_type];
            $this->component->docs[$idx]['type'] = $item->doc_type;
            $this->component->docs[$idx]['num'] = $item->doc_num;
            $this->component->docs[$idx]['date'] = $item->doc_date;
            $this->component->docs[$idx]['is_disabled'] = false;
            ++$this->component->document_count;
        }
    }

    public function getObjectMovements() {
        if($locs = ObjectMovement::where(['obj_id' => $this->component->obj_id])->orderBy('object_id', 'ASC')->get()) {
            foreach($locs as $idx=>$item) {
                $this->component->movements[$idx]['location_name'] = config('options.location_types')[$item->object_location];
                $this->component->movements[$idx]['location'] = $item->object_location;
                $this->component->movements[$idx]['date'] = $item->object_date;
                $this->component->movements[$idx]['description'] = $item->object_description;
            }
        }
    }

}