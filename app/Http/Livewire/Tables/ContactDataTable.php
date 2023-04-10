<?php

namespace App\Http\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\ContactData;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class ContactDataTable extends DataTableComponent
{
    protected $model = ContactData::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return $query = ContactData::select();
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Phone", "phone")
                ->sortable(),
            Column::make("Subjest", "subject")
                ->sortable(),
            Column::make("Message", "message")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->format(function ($value, $column, $row) {
                    return '<span class="badge badge-light-primary">' . date("M jS, Y h:i A", strtotime($value)) . '</span>';
                })
                ->html()
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->format(function ($value, $column, $row) {
                    return '<span class="badge badge-light-primary">' . date("M jS, Y h:i A", strtotime($value)) . '</span>';
                })
                ->html()
                ->sortable(),
        ];
    }

    public function filters(): array
    {
        return [
            DateFilter::make('Created At', 'created_at')
                ->filter(function ($query, $value) {
                    $query->where('created_at', $value);
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
