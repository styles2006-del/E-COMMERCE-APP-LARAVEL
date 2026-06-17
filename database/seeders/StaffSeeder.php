<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

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
                'password' => Hash::make('987654321')
            ]
        ]);

        DB::table('staffs')->insert([
            'user_id' => 3
        ]);

        $user = User::where('phone','90909090')->first();
        $user->assignRole('manager');
    }
}
