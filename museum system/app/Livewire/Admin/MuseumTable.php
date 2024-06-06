<?php

namespace App\Livewire\Admin;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Models\Museum;

class MuseumTable extends DataTableComponent
{
    protected $model = Museum::class;

    public $selectedItem;

    protected bool $useSelection = true;
    protected function canSelect(): bool
    {
        // ...

        return true;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('museum_id');
        $this->setDefaultSort('museum_id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make("#ID", "museum_id")
                ->sortable(),
            Column::make("Назва", "museum_name")
                ->sortable()->searchable(),
            Column::make("Шифр", "museum_code")
                ->sortable(),
            Column::make("Тип музею", "museum_type")
                ->sortable()->format(
                    fn($value, $row, Column $column) => config('types.museum')[$row->museum_type]
                ),
            Column::make(' ')
                ->label(
                    function ($row, Column $column) {
                        return view('livewire.components.button-edit', ['row_id' => $row->museum_id]);
                    }
                )->html(),
        ];
    }

    public function destroy()
    {
        Model::destroy($this->selectedItem);
    }
}

