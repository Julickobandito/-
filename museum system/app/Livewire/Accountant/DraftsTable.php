<?php

namespace App\Livewire\Accountant;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\DraftList;


class DraftsTable extends DataTableComponent
{
    protected $model = DraftList::class;

    public $selectedItem;
    protected bool $useSelection = true;

    protected function canSelect(): bool
    {
        return true;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('obj_id');
        $this->setDefaultSort('obj_id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make("# ID", "obj_id")
                ->hideIf(true),
            Column::make("Номер у книзі надходжень", "record_number")
                ->sortable()->searchable(),
            Column::make("Етап реєстрації", "record_type")
                ->sortable()->format(
                    fn($value, $row, Column $column) => config('types.book')[$row->record_type]
                ),
            Column::make("Останнє редагування", "process_edit_date")
                ->sortable(),
            Column::make(' ')
                ->label(
                    function ($row, Column $column) {
                        return view('livewire.components.button-draft-continue', ['row_id' => $row->obj_id, 'record_type' => $row->record_type]);
                    }
                )->html(),
        ];
    }
}
