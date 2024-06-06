<?php

namespace App\Services;

use Livewire\Component;
use App\Models\MuseumObjDescription;
use App\Models\MuseumObject;
use App\Models\Document;
use App\Models\VarietyBook;
use App\Models\BookRecord;
use App\Models\Book;
use App\Models\Museum;
use App\Models\Section;
use App\Models\Jewel;
use App\Models\Process;


class RegisterSpecialService extends RegisterService {

    public $validatorsMultiPage = [];
    public $validatorsMsgMultiPage = [];

    public function __construct(Component $component) {
        parent::__construct($component);

        $this->validatorsMultiPage = [
            1 => [
                'book_code' => 'required',
                'record_number' => 'required',
                'record_registered' => 'required',
            ]
        ];

        $this->validatorsMsgMultiPage = [
            1 => [
                'book_code.required' => config('msg.field-required'),
                'record_number.required' => config('msg.field-required'),
                'record_registered.required' => config('msg.field-required'),
            ]
        ];
        // add custom validation for jewels
        if($this->component->have_metals) {
            $this->validatorsMultiPage[1]['metals'] = 'required';
            $this->validatorsMultiPage[1]['metals.required'] = config('msg.field-required');
        }
        if($this->component->have_jewelry) {
            $this->validatorsMultiPage[1]['gems'] = 'required';
            $this->validatorsMultiPage[1]['gems.required'] = config('msg.field-required');
        }
    }

    public function getStorageGroups() {

        $museum = Museum::find($this->component->museum_id);

        $items = VarietyBook::select('varbook_id', 'varbook_code', 'varbook_descr')->where('varbook_museum_type', $museum->museum_type)->get();

        return $items;
    }

    public function getSections() {

        $items = Section::select('section_id', 'section_code', 'section_descr')->where('museum_id', $this->component->museum_id)->get();

        return $items;
    }

    public function getCurrentInventoryBook($varbook_code='101') {
        if($varbook = VarietyBook::where('varbook_code', $varbook_code)->first()) {
            $this->component->varbook_id = $varbook->varbook_id;
            
            if($book = Book::where([
                'museum_id' => $this->component->museum_id, 
                'book_type' => 'special', 
                'book_current' => true, 
                'varbook_id' => $varbook->varbook_id,
            ])->first()) {
                $this->component->book_id = $book->book_id;
                $this->component->book_code = $book->book_code;
                $this->component->book_description = $book->book_description;
            }
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

    public function getIncomeBookRecord() {
        $record = BookRecord::where(['obj_id' => $this->component->obj_id, 'record_type' => 'income'])->firstOrFail();
        return $record;
    }

    public function copyFromIncome(int $id) {
        $obj = MuseumObject::where('obj_id', $id)->firstOrFail();
        $this->component->museum_id = $obj->museum_id;
        $this->component->obj_name = $obj->obj_name;

        // опис предмету
        $descr = MuseumObjDescription::where(['obj_id' => $id, 'descr_type' => 'income'])->firstOrFail();
        $this->component->obj_id = $descr->obj_id;
    
        $this->component->author = $descr->descr_author;
        $this->component->description = $descr->descr_description;
        $this->component->amount = $descr->descr_amount;
        $this->component->materials = $descr->descr_materials;
        $this->component->sizes = $descr->descr_sizes;
        $this->component->metals = $descr->descr_have_metals;
        $this->component->jewelry = $descr->descr_have_jewelry;
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

        // додаткові необов'язкові документи
        $this->component->document_count = 0;
        $docs = Document::where(['obj_id' => $id, 'doc_primary' => false])->get();
        foreach($docs as $idx=>$item) {
            $this->component->docs[$idx]['type'] = $item['doc_type'];
            $this->component->docs[$idx]['num'] = $item['doc_num'];
            $this->component->docs[$idx]['date'] = $item['doc_date'];
            ++$this->component->document_count;
        }
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
        if($section = Section::where(['section_code' => $this->component->section])->first()) {
            $descr->section_id = $section->section_id;
        }
        $descr->descr_amount = $this->component->amount;
        $descr->descr_restoration = $this->component->restoration;
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

    public function upsertJewels() {

        Jewel::where(['obj_id' => $this->component->obj_id])->delete();

        $types = ['metals' => 'metal', 'gems' => 'gem']; 

        foreach(['metals', 'gems'] as $type) {

            // додаємо дорогоцінні матеріали
            foreach($this->component->$type as $item) {
                $jewel = new Jewel();
                $jewel->obj_id = $this->component->obj_id;
                $jewel->jewel_type = $type;
                $jewel->jewel_name = "{$types[$type]}-{$item['name']}";
                $jewel->jewel_mass = $item['mass'];
                $jewel->jewel_sample = $item['sample'] ?? null;
                $jewel->save();
            }
        }
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
        if($descr = MuseumObjDescription::where(['obj_id' => $id, 'descr_type' => 'income'])->first()) {
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

        $jewels = Jewel::where(['obj_id' => $this->component->obj_id])->get();

        //$types = ['metals' => 'metal', 'gems' => 'gem']; 

        // отримуємо дорогоцінні матеріали
        foreach($jewels as $idx => $item) {
            $type = $item->jewel_type;
            $this->component->$type[$idx]['name'] = strip_first_segment($item->jewel_name);
            $this->component->$type[$idx]['mass'] = $item->jewel_mass;
            $this->component->$type[$idx]['sample'] = $item->jewel_sample ? $item->jewel_sample : null;
        }

        // додаткові необов'язкові документи
        $this->component->document_count = 0;
        $docs = Document::where(['obj_id' => $id, 'doc_primary' => false])->get();
        foreach($docs as $idx=>$item) {
            $this->component->docs[$idx]['type'] = $item['doc_type'];
            $this->component->docs[$idx]['num'] = $item['doc_num'];
            $this->component->docs[$idx]['date'] = $item['doc_date'];
            $this->component->docs[$idx]['is_disabled'] = false;
            ++$this->component->document_count;
        }
    }

    public function upsertProcess($from) {
        if($this->component->obj_id) {
            $proc = Process::where(['obj_id' => $this->component->obj_id])->firstOrFail();
        }
        $proc->user_id = $this->component->user_id;
        if($from =='draft') {
            $proc->process_state = $this->component->book_type.'-book-draft';
        }
        if($from =='complete') {
            $proc->process_state = 'complete';
        }
        $proc->process_edit_date = date('Y-m-d');

        $proc->save();
    }
}
