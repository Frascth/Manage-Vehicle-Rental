<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiclePost extends Model
{
    use HasFactory;
    protected $table = 'vehicle_posts';

    public function vehicle_owner() {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function brand() {
        return $this->belongsTo(MasterVehicleBrand::class, 'brand_id', 'id');
    }
}
