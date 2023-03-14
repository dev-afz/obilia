<?php

namespace App\Http\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Job;
use Excel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class JobTable extends DataTableComponent
{
    protected $model = Job::class;

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
            Column::make('Banner', 'banner')
                ->format(function ($value, $coumn, $row) {
                    return view('content.table-component.avatar', ['image' => $value]);
                }),
            Column::make('User Name', 'client.name')
                ->sortable(),
            Column::make('Title', 'title')
                ->sortable(),
            Column::make('Payment Type', 'payment_type')
                ->sortable(),
            Column::make('Work Hours', 'work_hours')
                ->sortable(),
            Column::make('Size', 'size')
                ->sortable(),
            Column::make('Visibility', 'visibility')
                ->sortable(),
            Column::make('Country', 'country')
                ->sortable(),
            Column::make('Rate From', 'rate_from')
                ->sortable(),
            Column::make('Rate To', 'rate_to')
                ->sortable(),
            Column::make('Experience Level', 'experience.name')
                ->sortable(),
            Column::make('Sub Category', 'sub_category.name')
                ->sortable(),
            Column::make('Work Length', 'work_length.name')
                ->sortable(),
            // Column::make('Meta Data', 'metadata')
            //     ->format(function ($value) {
            //         $metadata = explode(',', $value);
            //         $m = '';
            //         foreach ($metadata as $key => $meta) {
            //             $m .= '<span class="badge badge-light-primary mt-1">' . $meta . '</span>';
            //             if ($key % 3) {
            //                 $m .= '<br>';
            //             }
            //         }
            //         return $m;
            //     })
            //     ->html()
            //     ->sortable(),
            Column::make('Description', 'description')
                ->format(function ($value, $column, $row) {
                    $html = '<span class="d-none" hidden data-hidden>' . $value . '</span>';
                    return $html .= '<button data-job-description class="btn btn-success btn-sm">View</button>';
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
                ->filter(function ($query, $value) {
                    $query->whereDate('created_at', $value);
                }),
            SelectFilter::make('Status', 'status')
                ->options([
                    'active' => 'Active',
                    'pendin' => 'Pending',
                    'completed' => 'Completed',
                    'cancelled' => 'Cancelled',
                ])
                ->filter(function ($query, $value) {
                    $query->where('status', $value);
                })
        ];
    }

    public function builder(): Builder
    {
        return Job::query()
            ->with('client', 'experience', 'work_length', 'sub_category')->select();
    }

    public function bulkActions(): array
    {
        return [
            // 'export' => 'Export',
            'refresh' => 'Refresh'
        ];
    }

    // public function export()
    // {
    //     $jobs = $this->getSelected();

    //     $this->clearSelected();
    //     return Excel::download(new JobExport($jobs), 'jobs.xlsx');
    // }
    public function refresh(): void
    {
    }
}
