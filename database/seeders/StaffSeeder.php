<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'firstname' => 'gnanta',
                'lastname' => 'achahame',
                'gender' => 'M',
                'phone' => '90909090',
                'birth_day' => '18-02-2007',
                'email' => 'gnanta22157@gmail.com',
                'password' => '987654321'
            ]
        ]);

        DB::table('staffs')->insert([
            'user_id' => 3
        ]);
    }
}
