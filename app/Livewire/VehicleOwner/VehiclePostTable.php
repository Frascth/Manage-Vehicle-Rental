<?php

namespace App\Livewire\VehicleOwner;

use App\Exports\VehiclePostExport;
use App\Helpers\Constant;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\VehiclePost;
use Carbon\Carbon;
use Error;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\ToArray;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Maatwebsite\Excel\Facades\Excel;

class VehiclePostTable extends DataTableComponent
{
    protected $model = VehiclePost::class;

    public function filters(): array
    {
        return [
        ];
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        // styling bootstrap 5
        $this->setTableAttributes([
            'class' => 'table table-striped table-hover',
        ]);
        $this->setTdAttributes(function(Column $column, $row, $columnIndex, $rowIndex) {
            return [
                'class' => 'text-nowrap',
            ];
         
        });
        $this->setThAttributes(function(Column $column) {
            return [
                'class' => 'text-nowrap',
            ];
        });

        // bulk action
    }

    public function bulkActions(): array
    {
        return [
            'exportSelected' => 'Export',
        ];
    }

    public function exportSelected() {
        return Excel::download(new VehiclePostExport($this->getSelected()), 'vehicle_posts_' . Carbon::now()->format('d_m_Y') . '.xlsx');
        $this->clearSelected();
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Brand", "brand.name")
                ->sortable(),
            Column::make("Vehicle type", "vehicle_type.name")
                // ->format(fn($value, $row, $column) => Constant::$vehicleType[$value])
                ->sortable()
                ->searchable(function(Builder $query, $term) {
                    return $query->orWhere('vehicle_type.name', 'like', '%' . trim($term) . '%');
                }),
            Column::make("Model", "model")
                ->sortable(),
            Column::make("Transmission type", "transmission_type.name")
                ->sortable()
                ->searchable(function(Builder $query, $term) {
                    return $query->orWhere('transmission_type.name', 'like', '%' . trim($term) . '%');
                }),
            Column::make("Door count", "door_count")
                ->sortable(),
            Column::make("Seat count", "seat_count")
                ->sortable(),
            Column::make("Max fuel", "max_fuel")
                ->sortable(),
            Column::make("Curr fuel", "curr_fuel")
                ->sortable(),
            Column::make("Fuel efficiency", "fuel_efficiency")
                ->sortable(),
            Column::make("Manufactur date", "manufactur_date")
                ->sortable(),
            Column::make("Usage time", "usage_time")
                ->sortable(),
            Column::make("Owner", "vehicle_owner.name")
                ->sortable(),
            Column::make("Price", "price")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),

            Column::make('Action')
            ->label(
                fn ($row, Column $column) => view('components.livewire.datatables.action-column')->with(
                    [
                        'viewLink' => route('vehicle-post.view', $row),
                        'editLink' => route('vehicle-post.edit', $row),
                        'deleteLink' => route('vehicle-post.delete', $row),
                    ]
                )
            )->html(),
        ];
    }

}
