<?php

namespace Database\Factories;

use App\Helpers\Constant;
use App\Models\MasterVehicleBrand;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VehiclePost>
 */
class VehiclePostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brand_ids = MasterVehicleBrand::pluck('id')->toArray();
        $vehicleType = array_rand(Constant::$vehicleType);
        $doorCount = intval($vehicleType) === 1 ? 0 : random_int(2, 4);
        
        $seatCount = random_int(1, 2);
        if (intval($vehicleType) !== 1) {
            $seatCount = random_int(2, 20);
        }

        $maxFuel = intval($vehicleType) === 1 ? random_int(5, 10) : random_int(10, 50);
        $currFuel = random_int(0, $maxFuel);
        $fuelEfficiency = intval($vehicleType) === 1 ? random_int(30, 60) : random_int(5, 60);
        $ownerIds = User::whereHas('roles', function(Builder $query) {
                $query->where('name', 'vehicle-owner');
            })
            ->pluck('id')
            ->toArray();


        return [
            'brand_id' => $this->faker->randomElement($brand_ids),
            'vehicle_type' => $vehicleType,
            'model' => $this->faker->lastName(),
            'transmission_type' => $this->faker->randomElement(array_keys(Constant::$transmissionType)),
            'door_count' => $doorCount,
            'seat_count' => $seatCount,
            'max_fuel' => $maxFuel,
            'curr_fuel' => $currFuel,
            'fuel_efficiency' => $fuelEfficiency,
            'manufactur_date' => $this->faker->date(),
            'usage_time' => random_int(30, 360*5),
            'owner_id' => $this->faker->randomElement($ownerIds),
            'price' => random_int(100, 500),
        ];
    }
}
