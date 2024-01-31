<?php

namespace Database\Seeders;

use App\Models\MasterVehicleBrand;
use Database\Factories\MasterVehicleBrandFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterVehicleBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterVehicleBrand::factory()->count(10)->create();
    }
}
