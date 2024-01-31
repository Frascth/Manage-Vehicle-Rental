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
        VehiclePost::factory()->count(115)->create();
    }
}
