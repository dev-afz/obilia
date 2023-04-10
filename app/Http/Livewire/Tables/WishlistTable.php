<?php

namespace App\Http\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Builder;

class WishlistTable extends DataTableComponent
{
    protected $model = Wishlist::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return $query = Wishlist::select();
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
            Column::make("From", "from")
                ->sortable(),
            Column::make("Expertise", "expertise")
                ->format(function ($value, $column, $row) {
                    $ex = explode(',', $value);
                    $expertise = '';
                    foreach ($ex as $key => $e) {
                        $expertise .= '<span class="badge badge-light-primary">' . $e . '</span>';
                    }
                    return $expertise;
                })
                ->html()
                ->sortable(),
            Column::make("Created at", "created_at")
                ->format(function ($value, $column, $row) {
                    return '<span class="badge badge-light-primary">' . date('M jS, Y h:a A', strtotime($value)) . '</span>';
                })
                ->html()
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->format(function ($value, $column, $row) {
                    return '<span class="badge badge-light-primary">' . date('M jS, Y h:a A', strtotime($value)) . '</span>';
                })
                ->html()
                ->sortable(),
        ];
    }
}
