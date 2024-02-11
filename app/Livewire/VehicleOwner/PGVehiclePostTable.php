<?php

namespace App\Livewire\VehicleOwner;

use App\Helpers\Constant;
use App\Models\VehiclePost;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class VehiclePostTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return VehiclePost::query()->with(['brand', 'vehicle_owner']);
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('brand.name')
            ->add('vehicle_type', fn (VehiclePost $model) => Constant::$vehicleType[$model->vehicle_type])
            ->add('model')
            ->add('transmission_type', fn (VehiclePost $model) => Constant::$transmissionType[$model->transmission_type])
            ->add('door_count')
            ->add('seat_count')
            ->add('max_fuel')
            ->add('curr_fuel')
            ->add('fuel_efficiency')
            ->add('manufactur_date_formatted', fn (VehiclePost $model) => Carbon::parse($model->manufactur_date)->format('d-m-Y'))
            ->add('usage_time')
            ->add('vehicle_owner.name')
            ->add('price')
            ->add('created_at_formatted', fn (VehiclePost $model) => Carbon::parse($model->created_at)->format('d-m-Y'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Brand name', 'brand.name'),
            Column::make('Vehicle type', 'vehicle_type'),
            Column::make('Model', 'model')
                ->sortable()
                ->searchable(),

            Column::make('Transmission type', 'transmission_type'),
            Column::make('Door count', 'door_count'),
            Column::make('Seat count', 'seat_count'),
            Column::make('Max fuel', 'max_fuel'),
            Column::make('Curr fuel', 'curr_fuel'),
            Column::make('Fuel efficiency', 'fuel_efficiency')
                ->sortable()
                ->searchable(),

            Column::make('Manufactur date', 'manufactur_date_formatted', 'manufactur_date')
                ->sortable(),

            Column::make('Usage time', 'usage_time'),
            Column::make('Owner', 'vehicle_owner.name'),
            Column::make('Price', 'price'),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('manufactur_date_formatted'),
            Filter::datepicker('created_at_formatted'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(\App\Models\VehiclePost $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
