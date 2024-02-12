<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiclePost extends Model
{
    use HasFactory;
    protected $table = 'vehicle_posts';
    protected $fillable = [
        'brand_id',
        'vehicle_type_id',
        'model',
        'transmission_type_id',
        'door_count',
        'seat_count',
        'max_fuel',
        'curr_fuel',
        'fuel_efficiency',
        'manufactur_date',
        'usage_time',
        'owner_id',
        'price',
    ];

    public function vehicle_owner() {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function brand() {
        return $this->belongsTo(MasterVehicleBrand::class, 'brand_id', 'id');
    }

    public function vehicle_type() {
        return $this->belongsTo(MasterVehicleType::class, 'vehicle_type_id', 'id');
    }

    public function transmission_type() {
        return $this->belongsTo(MasterTransmissionType::class, 'transmission_type_id', 'id');
    }
}
