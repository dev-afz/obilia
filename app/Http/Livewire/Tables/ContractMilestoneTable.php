<?php

namespace App\Http\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\ContractMilestone;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class ContractMilestoneTable extends DataTableComponent
{
    protected $model = ContractMilestone::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }


    public function builder(): Builder
    {
        return $query = ContractMilestone::query()->with(['contract'])->select();
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make('Contract', 'contract.title')
                ->sortable(),
            Column::make("Title", "title")
                ->sortable(),
            Column::make("Cost", "cost")
                ->sortable(),
            Column::make("Description", "description")
                ->format(function ($value, $row, $column) {
                    $html = '<span hidden data-hidden class="d-none">' . $value . '</span>';
                    return $html .= '<button data-milestone-description class="btn btn-success btn-sm">View</button>';
                })
                ->html()
                ->sortable(),
            Column::make("Razorpay Order Id", 'razorpay_order_id')
                ->sortable(),
            Column::make('Fund Added', 'escrow_fund_added_time')
                ->format(function ($value) {
                    if (empty($value)) {
                        return '<span class="badge bg-light-danger">No fund added</span>';
                    }
                    return '<span class="badge bg-light-success">' . date("M jS, Y h:i A", strtotime($value)) . '</span>';
                })
                ->html()
                ->sortable(),
            Column::make('Fund Released', 'escrow_fund_released_time')
                ->format(function ($value) {
                    if (empty($value)) {
                        return '<span class="badge bg-light-danger">No fund released</span>';
                    }
                    return '<span class="badge bg-light-success">' . date("M jS, Y h:i A", strtotime($value)) . '</span>';
                })
                ->html()
                ->sortable(),
            Column::make('Due Date', 'due_date')
                ->format(function ($value) {
                    if (empty($value)) {
                        return '<span class="badge badge-light-danger">NA</span>';
                    }

                    return '<span class="badge bg-light-success">' . date("M jS, Y h:i A", strtotime($value)) . '</span>';
                })
                ->html()
                ->sortable(),
            Column::make('Completed At', 'completed_at')
                ->format(function ($value, $column, $row) {
                    if (empty($value)) {
                        return '<span class="badge badge-light-danger">NA</span>';
                    }
                    return '<span class="badge badge-light-success">' . date("M jS, Y h:i A", strtotime($value)) . '</span>';
                })
                ->sortable()
                ->html(),
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
                    'pending' => 'Pending',
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
