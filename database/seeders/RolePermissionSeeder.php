<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_client = Role::where('name','client')->first();
        $role_manager = Role::where('name','manager')->first();
        $role_delivery_person = Role::where('name','delivery person')->first();
        $client_permission = Permission::whereIn('name', ['order.checkout','order.callback'])->get();
        $manager_permission = Permission::all();
        $delivery_person_permission = Permission::where('name','like','%orders.%')->get();
        $role_client->syncPermissions($client_permission);
        $role_manager->syncPermissions($manager_permission);
        $role_delivery_person->syncPermissions($delivery_person_permission);
    }
}
