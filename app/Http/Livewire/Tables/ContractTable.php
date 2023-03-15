<?php

namespace App\Http\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Contract;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class ContractTable extends DataTableComponent
{
    protected $model = Contract::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return $query = Contract::query()->with(['user', 'client'])->select();
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Title", "title")
                ->sortable(),
            Column::make("Start Date", "start_date")
                ->format(function ($value, $row, $column) {
                    if (empty($value)) {
                        return '<span class="badge badge-light-danger>NA</span>';
                    }
                    return '<span class="badge badge-light-success">' . date("M jS, Y h:i A", strtotime($value)) . '</span>';
                })
                ->html()
                ->sortable(),
            Column::make("Cost", "cost")
                ->sortable(),
            Column::make("Client", "client.name")
                ->sortable(),
            Column::make("Provider", "user.name")
                ->format(function ($value, $row, $column) {
                    return $row->user->name;
                })
                ->sortable(),
            Column::make('Description', 'description')
                ->format(function ($value, $column, $row) {
                    $html = '<span hidden data-hidden class="d-none">' . $value . '</span>';
                    return $html .= '<button class="btn btn-success btn-sm" data-contract-description>View</button>';
                })
                ->html()
                ->sortable(),
            Column::make("Created at", "created_at")
                ->format(function ($value, $column, $row) {
                    return '<span class="badge badge-light-primary">' . date("M jS, Y h:i A", strtotime($value)) . '</span>';
                })
                ->sortable()
                ->html(),
            Column::make("Updated at", "updated_at")
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
                    return $query->whereDate('created_at', $value);
                }),
            SelectFilter::make('Status', 'status')
                ->options([
                    'pending' => 'pending',
                    'active' => 'Active',
                    'completed' => 'Completed',
                    'cancelled' => 'Cancelled'
                ])
                ->filter(function ($query, $value) {
                    $query->where('status', $value);
                })
        ];
    }

    public function bulkActions(): array
    {
        return [
            'refresh' => 'Refresh'
        ];
    }
    public function refresh()
    {
    }
}
