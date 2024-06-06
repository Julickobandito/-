<?php

namespace App\Livewire\Admin;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

use App\Models\User;

class StaffTable extends DataTableComponent
{
    protected $model = User::class;

    public $selectedItem;

    protected bool $useSelection = true;
    protected function canSelect(): bool
    {
        // ...

        return true;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make("#ID", "id")
                ->sortable(),
            Column::make("Назва", "name")
                ->sortable()->searchable(),
            Column::make("Email", "email")
                ->sortable()->searchable(),
            /* Column::make("Роль", "staff_type")
                ->sortable()->format(
                    fn($value, $row, Column $column) => config('types.museum')[$row->staff_type]
                ), */
            Column::make(' ')
                ->label(
                    function ($row, Column $column) {
                        return view('livewire.components.button-edit', ['row_id' => $row->id]);
                    }
                )->html(),
        ];
    }

    public function destroy()
    {
        Model::destroy($this->selectedItem);
    }
}

