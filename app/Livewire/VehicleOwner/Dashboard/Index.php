<?php

namespace App\Livewire\VehicleOwner\Dashboard;

use Livewire\Component;
use App\Models\VehiclePost;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\DataTables\VehiclePostsDataTable;

class Index extends Component
{
    public function render()
    {
        return view('livewire.vehicle-owner.dashboard.index');
    }

}