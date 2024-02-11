<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterTransmissionType extends Model
{
    use HasFactory;
    protected $table = 'm_transmission_types';
    
    public function vehicle_posts() {
        return $this->hasMany(VehiclePost::class, 'transmission_type_id', 'id');
    }
}
