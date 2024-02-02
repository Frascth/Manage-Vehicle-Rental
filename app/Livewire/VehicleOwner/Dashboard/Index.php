<?php

namespace App\Livewire\VehicleOwner\Dashboard;

use Livewire\Component;
use App\Models\VehiclePost;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\DataTables\VehiclePostsDataTable;

class Index extends Component
{
    public $test = false;

    public function render(VehiclePostsDataTable $vehiclePostsDataTable)
    {
        // VehiclePost::whereHas('vehicle_owner', function (Builder $query) {
        //     $query->where('id', Auth::user()->id);
        // })
        // ->with(['vehicle_owner', 'brand'])
        // ->chunk(200, function ($posts) use (&$vehiclePosts) {
        //     // Process each chunk of 200 records
        //     $vehiclePosts = array_merge($vehiclePosts, $posts->toArray());
        // });

        // $vehiclePosts = VehiclePost::whereHas('vehicle_owner', function (Builder $query) {
        //     $query->where('id', Auth::user()->id);
        // })
        // ->with(['vehicle_owner', 'brand'])
        // ->get()
        // ->toArray();

        // $vehiclePosts = VehiclePost::with(['vehicle_owner', 'brand'])
        // ->get()
        // ->toArray();

        $vehiclePosts = [];
        return view('livewire.vehicle-owner.dashboard.index',[
            'vehiclePosts' => $vehiclePosts,
        ]);
    }

    public function meow() {
        dd('test is ', $this->test);
    }
}