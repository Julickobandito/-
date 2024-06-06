<?php

namespace App\Livewire\Accountant;

use App\Livewire\CommonComponent;
use App\Models\IncomeBook;
use App\Models\VarietyBook;
use App\Models\Book;
use Livewire\Attributes\On; 


class IncomeBookList extends CommonComponent
{
    public $b_id, $book_code, $book_description, $book_current, $numbers, $quantity;
    public $upd_book_code, $upd_book_description, $upd_book_current, $upd_numbers, $upd_quantity;

    public $isActiveBook;
    public $book_type = 'income';
    public $varbook_id;
    public $varbook_code;

    public function render()
    {
        return view('livewire.accountant.income-book-list');
    }

    public function mount() {
        $this->checkIsActiveBook();
    }

    #[On('openInfoBookModal')]
    public function openInfoBookModal($id) {
        if($item = IncomeBook::find($id)) {
            $this->book_id = $item->book_id;
            $this->book_code = $item->book_code;
            $this->book_description = $item->book_description;
            $this->book_current = $item->book_current;
            $this->numbers = format_book_numbers($item->numbers);
            $this->quantity = $item->quantity;
        }
    }

    #[On('openAddBookModal')]
    public function openAddBookModal() {
        $this->book_code = '';
        $this->book_name = '';
        $this->book_description = '';
    }

    #[On('openEditBookModal')]
    public function openEditBookModal($id) {
        if($item = Book::find($id)) {
            $this->b_id = $item->book_id;
            $this->upd_book_code = $item->book_code;
            $this->upd_book_description = $item->book_description;
            $this->upd_book_current = $item->book_current;
        }
    }

    public function save() {
        $validated = $this->validate([
            'book_code' => 'required',
            'book_description' => 'required',
        ]);

        $validated['museum_id'] = $this->museum_id;
        $validated['varbook_id'] = $this->varbook_id;
        $validated['book_type'] = $this->book_type;
        $validated['book_current'] = true;

        $result = Book::create($validated);

        if($result) {
            $this->dispatch('closeAddBookModal');
            $this->refresh();
        }
    }

    public function update() {

        $validated = $this->validate([
            'upd_book_code' => 'required',
            'upd_book_description' => 'required',
            'upd_book_current' => 'required',
        ]);

        $this->upd_book_current = $this->upd_book_current == 'true' ? true : false;

        $result = Book::find($this->b_id)->update([
            'book_code' => $this->upd_book_code,
            'book_description' => $this->upd_book_description,
            'book_current' => $this->upd_book_current,
        ]);

        if($result) {
            $this->dispatch('closeEditBookModal');
            $this->refresh();
        }
    }

    #[On('refresh-list')]
    public function refresh() {
        $this->dispatch('refreshDatatable');
        $this->checkIsActiveBook();
    }

    protected function checkIsActiveBook() {
        $filters = request()->query();
        $fund = $filters['table-filters']['fund'] ?? '101';
        $this->varbook_code = $fund;
        if($varbook = VarietyBook::where('varbook_code', $fund)->first()) 
        {
            $this->varbook_id = $varbook->varbook_id;
            if(Book::where([
                'book_type' => $this->book_type, 'museum_id' => $this->museum_id, 
                'book_current' => true, 'varbook_id' => $varbook->varbook_id
            ])->count()) {
                $this->isActiveBook = true;
            } else {
                $this->isActiveBook = false;
            }
        }
    }
}
