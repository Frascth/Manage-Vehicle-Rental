<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterVehicleType extends Model
{
    use HasFactory;
    protected $table = 'm_vehicle_types';

    public function vehicle_posts() {
        return $this->hasMany(VehiclePost::class, 'vehicle_type_id', 'id');
    }

}
