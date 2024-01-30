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
        DB::table('users')->insert([
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('password1'),
        ]);

        DB::table('users')->insert([
            'name' => 'vehicle-owner1',
            'email' => 'vehicle-owner1@gmail.com',
            'password' => Hash::make('password1'),
        ]);

        DB::table('users')->insert([
            'name' => 'rentler1',
            'email' => 'rentler1@gmail.com',
            'password' => Hash::make('password1'),
        ]);

        // User::factory()
        //     ->count(3)
        //     ->create();
    }
}
