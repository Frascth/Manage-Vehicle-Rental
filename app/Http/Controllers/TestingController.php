<?php

namespace App\Http\Controllers;

use App\DataTables\VehiclePostsDataTable;
use App\Models\VehiclePost;
use Illuminate\Http\Request;

class TestingController extends Controller
{

    // data tables client side using data tables jquery
    public function dataTablesClientSide() {
        // $vehiclePosts = VehiclePost::whereHas('vehicle_owner', function (Builder $query) {
        //     $query->where('id', Auth::user()->id);
        // })
        // ->with(['vehicle_owner', 'brand'])
        // ->get()
        // ->toArray();

        $vehiclePosts = VehiclePost::with(['vehicle_owner', 'brand'])
        ->get()
        ->toArray();
        return view('tests.data-tables-client-side',[
            'vehiclePosts' => $vehiclePosts,
        ]);
    }

    // data tables server side using yajra
    public function yajraDataTables(VehiclePostsDataTable $vehiclePostsDataTable) {
        return $vehiclePostsDataTable->render('tests.yajra-data-tables');
    }
}
