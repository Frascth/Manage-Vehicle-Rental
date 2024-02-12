<?php

namespace App\Livewire\VehicleOwner\VehiclePost;

use App\Livewire\Forms\VehicleOwner\VehiclePostForm;
use App\Models\MasterTransmissionType;
use App\Models\MasterVehicleBrand;
use App\Models\MasterVehicleType;
use Livewire\Component;

class VehiclePostView extends Component
{
    public VehiclePostForm $form;

    public function render()
    {
        $brands = MasterVehicleBrand::all();
        $vehicleTypes = MasterVehicleType::all();
        $transmissionTypes = MasterTransmissionType::all();
        return view('livewire.vehicle-owner.vehicle-post.vehicle-post-view', [
            'brands' => $brands,
            'vehicleTypes' => $vehicleTypes,
            'transmissionTypes' => $transmissionTypes,
        ]);
    }

    public function save()
    {
        $this->form->store();
    }
}
