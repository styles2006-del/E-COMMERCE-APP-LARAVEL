<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        echo "database seeder called\n";
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            RolePermissionSeeder::class,
            CategorieSeeder::class,
            ArticleSeeder::class,
            ClientSeeder::class,
            StaffSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
