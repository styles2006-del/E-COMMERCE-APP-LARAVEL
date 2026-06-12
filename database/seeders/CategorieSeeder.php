<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('categories')->insert([
        //     [
        //     'label' => 'electronique',
        //     'description' => 'article de technologie',
        //     'is_active' => true,
        //     'slug' => 'electronique'
        //     ],
        //     [
        //         'label' => 'alimentation',
        //         'description' => 'article alimentaire',
        //         'is_active' => true,
        //         'slug' => 'alimentation'
        //     ]
        // ]);
         for ($i=0; $i <5 ; $i++) { 
            DB::table('categories')->insert([
             [
             'label' => 'electronique'.$i,
             'description' => 'article de technologie',
             'is_active' => true,
             'slug' => 'electronique'.$i
             ]
            ]);
        }
    }
}
