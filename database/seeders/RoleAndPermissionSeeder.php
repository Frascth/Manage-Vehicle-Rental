<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::findOrCreate('admin');
        $roleVehicleOwner = Role::findOrCreate('vehicle-owner');
        $roleRentler = Role::findOrCreate('rentler');

        $permissionViewRegister = Permission::findOrCreate('view-register');
        $permissionEditRegister = Permission::findOrCreate('edit-register');

        $permissionCreateRental = Permission::findOrCreate('create-rental');
        $permissionEditRental = Permission::findOrCreate('edit-rental');
        $permissionDeleteRental = Permission::findOrCreate('delete-rental');
        $permissionViewRental = Permission::findOrCreate('view-rental');

        $permissionCreateRequest = Permission::findOrCreate('create-request');
        $permissionEditRequest = Permission::findOrCreate('edit-request');
        $permissionDeleteRequest = Permission::findOrCreate('delete-request');
        $permissionViewRequest = Permission::findOrCreate('view-request');

        $roleAdmin->givePermissionTo(
            $permissionViewRegister,
            $permissionEditRegister,
            $permissionViewRental,
        );

        $roleVehicleOwner->givePermissionTo(
            $permissionCreateRental,
            $permissionEditRental,
            $permissionDeleteRental,
            $permissionViewRental,
            $permissionViewRequest,
            $permissionEditRequest,
            $permissionDeleteRequest,
        );

        $roleRentler->givePermissionTo(
            $permissionViewRental,
            $permissionViewRequest,
            $permissionCreateRequest,
            $permissionEditRequest,
            $permissionDeleteRequest
        );

        $admin = User::where('name', 'admin1')->first();
        $vehicleOwner = User::where('name', 'vehicle-owner1')->first();
        $rentler = User::where('name', 'rentler1')->first();

        $admin->assignRole($roleAdmin);
        $vehicleOwner->assignRole($roleVehicleOwner);
        $rentler->assignRole($roleRentler);
        
    }

}