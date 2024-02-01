<?php

namespace Database\Seeders;

use App\Models\VehiclePost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehiclePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // VehiclePost::factory()->count(1000)->create();
        $count = 5000;
        $this->command->getOutput()->progressStart($count);
        for ($i = 0; $i < $count; $i++) {
            VehiclePost::factory()->create();
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
