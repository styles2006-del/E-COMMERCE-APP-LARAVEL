<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'firstname' => 'dieudonné',
                'lastname' => 'akpassou',
                'gender' => 'M',
                'phone' => '71397764',
                'birth_day' => '18-08-2004',
                'email' => 'asta22157@gmail.com',
                'password' => Hash::make('123456789')
            ],
            [
                'firstname' => 'luffy',
                'lastname' => 'monkey',
                'gender' => 'M',
                'phone' => '71397765',
                'birth_day' => '18-08-2004',
                'email' => 'dieudonne22157@gmail.com',
                'password' => Hash::make('00000000')
            ]
        ]);

        DB::table('clients')->insert([
            ['user_id' => 1],['user_id' => 2]
        ]);
    }
}
