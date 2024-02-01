<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\VehiclePost;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class VehicleOwner extends Component
{
    public $test = false;

    public function render()
    {
        // $vehiclePosts = VehiclePost::whereHas('vehicle_owner', function (Builder $query) {
        //     $query->where('id', Auth::user()->id);
        // })
        // ->with(['vehicle_owner', 'brand'])
        // ->get()
        // ->toArray();
        $vehiclePosts = VehiclePost::with(['vehicle_owner', 'brand'])
        ->get()
        ->toArray();
        return view('livewire.dashboard.vehicle-owner',[
            'vehiclePosts' => $vehiclePosts,
        ]);
    }

    public function meow() {
        dd('test is ', $this->test);
    }
}
