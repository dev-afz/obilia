<?php

namespace App\Http\Livewire\Tables;

use App\Models\JobApplication;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class JobApplicationTable extends DataTableComponent
{
    protected $model = JobApplication::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPaginationStatus(true);
        $this->setSearchDebounce(500);
    }

    public function builder(): Builder
    {
        return $query = JobApplication::query()->with('job')->select();
    }
    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make('Applicant', 'user.name')
                ->sortable(),
            Column::make('Posted By', 'job.client.id')
                ->format(function ($value, $row, $column) {
                    return $row->job->client->name;
                })
                ->sortable(),
            Column::make('Job', 'job.title')
                ->sortable(),
            Column::make('Price', 'bid_price')
                ->sortable(),
            Column::make('Document', 'document')
                ->format(function ($value) {
                    return view('content.table-component.avatar', ['image' => $value]);
                })
                ->sortable(),
            Column::make('Work Letter', 'work_letter')
                ->format(function ($value) {
                    $html = '<span hidden data-hidden class="d-none">' . $value . '</span>';
                    return $html .= '<button data-work-letter class="btn btn-success btn-sm">View</button>';
                })
                ->html()
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }

    public function filters(): array
    {
        return [
            DateFilter::make('Created At', 'created_at')
                ->filter(function ($value, $query) {
                    $query->whereDate('created_at', $value);
                }),
            SelectFilter::make('Status', 'status')
                ->options([
                    'accepted' => 'Accepted',
                    'pending' => 'Pending',
                    'rejected' => 'Rejected',
                ])
                ->filter(function ($query, $value) {
                    $query->where('status', $value);
                }),
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
