<?php

namespace App\Livewire\Accountant;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\SpecialBookRecord;


class SpecialBookRecordTable extends DataTableComponent
{
    protected $model = SpecialBookRecord::class;
    
    public $book_id;
    public $book_type;
    public $selectedItem;
    protected bool $useSelection = true;

    public function filters(): array {
        return [
        ];
    }

    public function mount() {
    }

    public function builder(): Builder
    {
        // filtering by book_id
        $filters = request()->query();
        if(isset($filters['book_id'])) $this->book_id = $filters['book_id'];

        return SpecialBookRecord::query()->where('book_id', $this->book_id);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('record_id');
        $this->setDefaultSort('record_id', 'desc');
        $this->setFiltersStatus(true);
        $this->setFiltersEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make("# ID", "record_id")
                ->hideIf(true),

            Column::make("Обліковий номер", "record_number")->sortable()->searchable(),

            Column::make("Назва предмета", "obj_name")->sortable()->searchable(),

            Column::make("Дата реєстрації", "record_registered"),

            Column::make("Останнє редагування", "record_edit_date"),

            Column::make(' ')
            ->label(
                function ($row, Column $column) {
                    return view('livewire.components.button-book-record-view', ['id' => $row->record_id, 'book_code']);
                }
            )->html(),
        ];
    }
}
