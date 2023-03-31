<?php

namespace App\Http\Livewire\Tables;

use App\Models\Industry;
use Illuminate\Http\Request;
use App\Exports\IndustryExport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Query\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\NumberFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class IndustryTable extends DataTableComponent
{
    protected $model = Industry::class;

    protected $edit_data = null;

    protected $name = "test", $image, $status;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPaginationStatus(true);
        $this->setSearchDebounce(500);
        $this->setConfigurableAreas([
            'after-pagination' => 'content.tables.edit.edit-industry',
        ]);
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
                ->format(function ($value, $column, $row) {
                    ($value === 'active') ? $status = 'success' : $status = 'danger';
                    return '<span class="badge text-capitalize badge-light-' . $status . '">' . $value . '</span>';
                })
                ->sortable()
                ->html(),

            Column::make("Actions", "id")
                ->label(function ($value, $column) {
                    return '<button class="btn btn-primary btn-sm" wire:click="edit(' . $value->id . ')">Edit</button>';
                })
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



    public function bulkActions(): array
    {
        return [
            'export' => 'Export',
            'refresh' => 'Refresh',
        ];
    }

    public function export()
    {
        $industries = $this->getSelected();

        // $this->clearSelected();
        // return Excel::download(new IndustryExport($industries), 'industries.xlsx');
    }

    public function refresh(): void
    {
    }


    public function edit($id)
    {
        $this->edit_data = Industry::find($id);

        $this->name = $this->edit_data->name;
        $this->image = $this->edit_data->image;

        \Log::info($this->name);

        $this->dispatchBrowserEvent('showCanvas', 'edit_industry');
    }


    public function update(Request $request)
    {
        //get submited data

        $data = $request->only(['name', 'image']);

        \Log::info($data);
    }
}
