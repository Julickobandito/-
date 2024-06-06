<?php

namespace App\Livewire\Accountant;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\LivewireComponentFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Models\IncomeBook;
use App\Models\Book;


class IncomeBookTable extends DataTableComponent
{
    protected $model = IncomeBook::class;

    public $selectedItem;
    protected bool $useSelection = true;

    public function filters(): array {
        return [
            SelectFilter::make('Тип фонду', 'fund')
                ->options([
                    //'' => 'Усі',
                    '101' => 'Основний',
                    '102' => 'Допоміжний',
                ])->filter(function(Builder $builder, string $value) {
                    $builder->where('varbook_code', $value);
                }),
        ];
    }

    public function mount() {
    
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
                        "<a href=\"/cabinet/accountant/income-book-record-list?book_id={$row->book_id}\">{$row->book_code}</a>"
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
