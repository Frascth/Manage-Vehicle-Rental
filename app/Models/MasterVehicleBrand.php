<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterVehicleBrand extends Model
{
    use HasFactory;
    protected $table = 'm_vehicle_brands';

    public function vehicle_posts() {
        return $this->hasMany(VehiclePost::class, 'brand_id', 'id');
    }
}
