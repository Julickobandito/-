<?php

namespace App\Livewire\Employee;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Mechanisms\HandleComponents\HandleComponents;
use App\Models\Searcher;
use DB;


class SearchTable extends DataTableComponent
{
    public $selectedItem;
    protected bool $useSelection = true;
    public $query;

    public function filters(): array {

        return [
        ];
    }

    public function mount() {
        sleep(0);
    }

    protected function canSelect(): bool
    {
        return true;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('obj_id');
        $this->setDefaultSort('obj_id', 'desc');
        $this->setSearchStatus(false);
        //$this->setFiltersStatus(true);
        //$this->setFiltersEnabled();
    }

    public function builder(): Builder
    {
        
        $filters = request()->query();
        if(isset($filters['table-search'])) $this->query = $filters['table-search'];

        DB::statement("SET settings.query = '{$this->query}'");

        return Searcher::query();
    }

    public function columns(): array
    {
        return [
            Column::make("# ID", "record_id")->hideIf(true),

            Column::make("Обліковий номер", "record_number"),

            Column::make("Назва експонату", "obj_name"),

            Column::make(' ')
            ->label(
                function ($row, Column $column) {
                    return view('livewire.components.button-search-record-view', ['id' => $row->record_id, 'query' => $this->query]);
                }
            )->html(),
        ];
    }
}
