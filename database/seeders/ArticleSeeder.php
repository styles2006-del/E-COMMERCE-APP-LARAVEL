<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\LaravelPdf\Facades\Pdf;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //DB::table('articles')->delete();

        // $categorie_id = DB::table('categories')->get();
        // $categorie_article = $categorie_id->firstWhere('slug','electronique0');

        DB::table('articles')->insert([
            [
                'label'=>"ordinateur portable",
                'current_price'=>50000,
                'quantity'=>10,
                'description'=>"ordinateur pour travailler",
                'is_active'=>true,
                'category_id'=> 1
            ],
            [
                'label'=>"unité centrale",
                'current_price'=>50000,
                'quantity'=>10,
                'description'=>"UC",
                'is_active'=>true,
                'category_id'=> 2
            ]
        ]);

    }
}
