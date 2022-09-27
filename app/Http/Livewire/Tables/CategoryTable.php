<?php

namespace App\Http\Livewire\Tables;

use App\Models\Category;
use App\Exports\CategoryExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Log;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\NumberFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class CategoryTable extends DataTableComponent
{
    protected $model = Category::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPaginationStatus(true);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),

            Column::make("Name", "name")
                ->searchable()
                ->sortable(),
            Column::make("Image", "image")
                ->format(function ($value, $column, $row) {
                    return view('content.table-component.avatar', ['image' => $value]);
                })
                ->html(),
            Column::make("Status", "status")
                ->searchable()
                ->sortable(),


            Column::make("Created at", "created_at")
                ->format(function ($value, $column, $row) {
                    return '<span class="badge badge-light-primary">' . date("M jS, Y h:i A", strtotime($value)) . '</span>';
                })
                ->sortable()
                ->html(),
        ];
    }



    public function filters(): array
    {
        return [
            DateFilter::make('Created At', 'created_at')
                ->filter(function ($query, $value) {
                    $query->whereDate('created_at', $value);
                }),
        ];
    }



    public function bulkActions(): array
    {
        return [
            'export' => 'Export',
            'refresh' => 'Refresh',
        ];
    }

    public function export()
    {
        $categories = $this->getSelected();

        $this->clearSelected();
        return Excel::download(new CategoryExport($categories), 'categories.xlsx');
    }

    public function refresh(): void
    {
        Log::info('refresh');
    }
}
