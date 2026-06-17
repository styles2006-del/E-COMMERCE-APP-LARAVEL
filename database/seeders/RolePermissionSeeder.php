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
        $client_permission = Permission::where('name','article.view')->get();
        $manager_permission = Permission::all();
        $role_client->syncPermissions($client_permission);
        $role_manager->syncPermissions($manager_permission);
    }
}
