<?php

namespace App\Http\Controllers;

use App\Models\VehiclePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        return 'welcome';

    }

    public function redirectDashboard (Request $request) {
        $roles = Auth::user()->getRoleNames()->toArray();
        
        if (in_array('rentler', $roles)) {
            return view('dashboard.rentler');
        }

        if (in_array('vehicle-owner', $roles)) {
            $vehiclePosts = VehiclePost::with(['vehicle_owner', 'brand'])
                ->get()
                ->toArray();
            return view('dashboard.vehicle-owner',[
                'vehiclePosts' => $vehiclePosts,
            ]);
        } 

        if (in_array('admin', $roles)) {
            return view('dashboard.admin');
        } 
        
        return view('dashboard');
    }
}
