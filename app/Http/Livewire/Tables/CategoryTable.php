<?php

namespace App\Http\Livewire\Tables;

use App\Models\Category;
use App\Exports\CategoryExport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Builder;
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
        $this->setSearchDebounce(500);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),

            Column::make("Name", "name")
                ->searchable()
                ->sortable(),
            Column::make("Industry", "industry.name")
                ->searchable()
                ->sortable(),
            Column::make("Image", "image")
                ->format(function ($value, $column, $row) {
                    return view('content.table-component.avatar', ['image' => $value]);
                })
                ->html(),
            Column::make("Status", "status")
                ->format(function ($value, $column, $row) {
                    ($value === 'active') ? $status = 'success' : $status = 'danger';
                    return '<span class="badge text-capitalize badge-light-' . $status . '">' . $value . '</span>';
                })
                ->sortable()
                ->html(),


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

            SelectFilter::make('Status', 'status')
                ->options([
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                ])
                ->filter(function ($query, $value) {
                    $query->where('status', $value);
                }),
        ];
    }



    public function query(): Builder
    {
        return Category::query()
            ->with('industry');
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
    }
}
