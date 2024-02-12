<?php

namespace App\Livewire\Forms\VehicleOwner;

use App\Models\VehiclePost;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Attributes\Rule;

class VehiclePostForm extends Form
{
    #[Validate('required', message:'Brand is required')]
    public $brandId;

    #[Validate('required', message:'Vehicle type is required')]
    public $vehicleTypeId;

    #[Validate('required|max:250', message:'Model name is required and not above 250 character')]
    public $modelName;

    #[Validate('required', message:'Transmission type is required')]
    public $transmissionTypeId;

    #[Validate('required|numeric', message:'Door count is required and must be numeric')]
    public $doorCount;

    #[Validate('required|numeric', message:'Seat count is required and must be numeric')]
    public $seatCount;

    #[Validate('required|numeric', message:'Maximum fuel is required and must be numeric')]
    public $maxFuel;

    #[Validate('required|numeric', message:'Current fuel is required and must be numeric')]
    public $currFuel;

    #[Validate('required|numeric', message:'Fuel efficiency is required and must be numeric')]
    public $fuelEfficiency;

    #[Validate('required|before_or_equal:now', message:'Manufactur date is required')]
    public $manufacturDate;

    #[Validate('required|numeric', message:'Usage time is required and must be numeric')]
    public $usageTime;

    #[Validate('required|numeric', message:'Price is required and must be numeric')]
    public $price;

    public function store()
    {
        $this->validate();

        $this->manufacturDate = Carbon::parse($this->manufacturDate);

        VehiclePost::create([
            'brand_id' => $this->brandId,
            'vehicle_type_id' => $this->vehicleTypeId,
            'model' => $this->modelName,
            'transmission_type_id' => $this->transmissionTypeId,
            'door_count' => $this->doorCount,
            'seat_count' => $this->seatCount,
            'max_fuel' => $this->maxFuel,
            'curr_fuel' => $this->currFuel,
            'fuel_efficiency' => $this->fuelEfficiency,
            'manufactur_date' => $this->manufacturDate,
            'usage_time' => $this->usageTime,
            'owner_id' => Auth::user()->id,
            'price' => $this->price,
        ]);
        dd(
            $this->brandId,
            $this->vehicleTypeId,
            $this->modelName,
            $this->transmissionTypeId,
            $this->doorCount,
            $this->seatCount,
            $this->maxFuel,
            $this->currFuel,
            $this->fuelEfficiency,
            $this->manufacturDate,
            $this->usageTime,
            $this->price,
        );
    }
}
