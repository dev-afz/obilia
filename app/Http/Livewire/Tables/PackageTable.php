<?php

namespace App\Http\Livewire\Tables;

use App\Models\Package;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class PackageTable extends DataTableComponent
{
    // protected $model = Package::class;
    // protected $relationships = ['perks'];








    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPaginationStatus(true);
        $this->setSearchDebounce(500);
        // $this->setBuilder(Package::query());
    }

    public function columns(): array
    {

        return [
            Column::make("Id", "id")
                ->sortable(),

            Column::make("Name")
                ->searchable()
                ->sortable(),
            Column::make("Duration")
                ->format(function ($value, $column, $row) {
                    return $value . ' days';
                })
                ->searchable()
                ->sortable(),
            Column::make("Price")
                ->format(function ($value, $column, $row) {
                    return '₹' . $value;
                })
                ->searchable()
                ->sortable(),
            Column::make("Discount")
                ->format(function ($value, $column, $row) {
                    return ($value) ? $value . '%' : 'No Discount';
                })
                ->searchable()
                ->sortable(),
            Column::make("For")
                ->searchable()
                ->sortable(),
            Column::make("Status")
                ->format(function ($value, $column, $row) {
                    ($value === 'active') ? $status = 'success' : $status = 'danger';
                    return '<span class="badge text-capitalize badge-light-' . $status . '">' . $value . '</span>';
                })
                ->sortable()
                ->html(),
            Column::make("Perks")
                ->label(function ($row, Column $column) {
                    $perks = '';
                    foreach ($row->perks as $perk) {
                        $perks .= '<span class="badge badge-light-primary mt-1">' . ucfirst(str_replace('_', ' ', $perk->name)) . " : " . $perk->value . '</span> ';
                    }
                    return $perks;
                })
                ->searchable(function ($query, $searchTerm) {
                    $query->whereHas('perks', function ($query) use ($searchTerm) {
                        $query->where('value', 'like', '%' . $searchTerm . '%');
                    });
                })
                // ->collapseOnMobile()
                ->html(),
            Column::make("Created at")
                ->format(function ($value, $column, $row) {
                    return '<span class="badge badge-light-primary">' . date("M jS, Y h:i A", strtotime($value)) . '</span>';
                })
                ->sortable()
                ->html(),
        ];
    }
    public function builder(): Builder
    {
        return Package::query()->with(['perks']);
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


    public function refresh(): void
    {
    }
}
