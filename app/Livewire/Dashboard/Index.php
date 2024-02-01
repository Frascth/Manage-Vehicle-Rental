<?php

namespace App\Livewire\Dashboard;

use App\Models\VehiclePost;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $roles = Auth::user()->getRoleNames()->toArray();
        
        if (in_array('rentler', $roles)) {
            return view('livewire.dashboard.rentler');
        }

        if (in_array('vehicle-owner', $roles)) {
            $vehiclePosts = VehiclePost::with(['vehicle_owner', 'brand'])
                ->get()
                ->toArray();
            return view('livewire.dashboard.vehicle-owner',[
                'vehiclePosts' => $vehiclePosts,
            ]);
        } 

        if (in_array('admin', $roles)) {
            return view('livewire.dashboard.admin');
        } 
        
        return view('livewire.dashboard.index');
    }
}
