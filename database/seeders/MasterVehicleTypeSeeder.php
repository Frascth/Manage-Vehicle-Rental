<?php

namespace Database\Seeders;

use App\Helpers\Constant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterVehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->getOutput()->progressStart(count(Constant::$vehicleType));
        foreach (Constant::$vehicleType as $key => $value) {
            DB::table('m_vehicle_types')->insert([
                'name' => $value,
            ]);
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
