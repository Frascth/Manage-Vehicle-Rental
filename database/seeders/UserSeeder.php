<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 2; $i < 20; $i++) {
            DB::table('users')->insert([
                'name' => 'admin' . $i,
                'email' => 'admin' . $i . '@gmail.com',
                'password' => Hash::make('password1'),
            ]);
    
            DB::table('users')->insert([
                'name' => 'vehicle-owner' . $i,
                'email' => 'vehicle-owner' . $i . '@gmail.com',
                'password' => Hash::make('password1'),
            ]);
    
            DB::table('users')->insert([
                'name' => 'rentler' . $i,
                'email' => 'rentler' . $i . '@gmail.com',
                'password' => Hash::make('password1'),
            ]);
        }


        // User::factory()
        //     ->count(3)
        //     ->create();
    }
}
