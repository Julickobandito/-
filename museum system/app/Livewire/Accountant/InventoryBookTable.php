<?php

namespace App\Livewire\Accountant;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Models\InventoryBook;
use App\Services\RegisterInventoryService;
use Livewire\Mechanisms\HandleComponents\HandleComponents;


class InventoryBookTable extends DataTableComponent
{
    protected $model = InventoryBook::class;

    public $varbook_code;
    public $selectedItem;
    protected bool $useSelection = true;
    protected $parent;

    public function filters(): array {

        $options = session('storage_groups');
        //session(['storage_groups' => null]);
        if(!$options) {
            $this->parent = app(HandleComponents::class)::$componentStack[0];
            $service = new RegisterInventoryService($this->parent);
            $groups = $service->getStorageGroups(); 
            $options = ["" => "Всі"];
            foreach($groups as $item) {
                $options[$item->varbook_code] = $item->varbook_descr;
            }
            session(['storage_groups' => $options]);
        }

        return [
            SelectFilter::make('Групи зберігання', 'storage_group')
                ->options($options)->filter(function(Builder $builder, string $value) {
                    $builder->where('varbook_code', $value);
                }),
        ];
    }

    public function mount() {
        $filters = request()->query();
        if(isset($filters['table-filters']['storage_group'])) {
            $this->varbook_code = $filters['table-filters']['storage_group'];
        }
    }

    protected function canSelect(): bool
    {
        return true;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('book_id');
        $this->setDefaultSort('book_id', 'desc');
        $this->setFiltersStatus(true);
        $this->setFiltersEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make("# ID", "book_id")
                ->hideIf(true),

            Column::make("Том", "book_code")->sortable()
                ->format(
                    fn($value, $row, Column $column) => 
                        "<a href=\"/cabinet/accountant/inventory-book-record-list?book_id={$row->book_id}&varbook_code={$this->varbook_code}\">{$row->book_code}</a>"
                )->html(),

            Column::make("Статус", "book_current")
                ->sortable()->format(fn($value, $row, Column $column) => $row->book_current ? 'Активний' : 'Завершений'),

            Column::make("Облікові номери", "numbers" )
                ->format(fn($value, $row, Column $column) => format_book_numbers($row->numbers)),

            Column::make(' ')
            ->label(
                function ($row, Column $column) {
                    return view('livewire.components.button-book-edit', ['id' => $row->book_id, 'book_code' => $row->book_code, 'info' => '' ]);
                }
            )->html(),
        ];
    }
}
