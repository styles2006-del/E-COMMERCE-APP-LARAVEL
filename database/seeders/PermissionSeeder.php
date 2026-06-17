<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * resource.view
     * resource.create
     * resource.delete
     * resource.update
     */
    public function run(): void
    {
       $permission_name = [
            'article.view',
            'article.create',
            'article.update',
            'article.delete',
       ];

       foreach ($permission_name as $name) {
            Permission::create(['name' => $name]);
       }
    }
}
