<?php

namespace App\Http\Controllers;

use App\DataTables\VehiclePostsDataTable;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(VehiclePostsDataTable $vehiclePostsDataTable) {
        return $vehiclePostsDataTable->render('datatable-test');
    }
}
