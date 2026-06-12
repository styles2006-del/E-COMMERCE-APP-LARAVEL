<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'date' => "2024-06-01",
                'delivery_status' => "PENDING",
                'client_id' => 1
            ],
            [
                'date' => "2024-06-01",
                'delivery_status' => "REJECT",
                'client_id' => 2
            ],
            [
                'date' => "2024-06-01",
                'delivery_status' => "START",
                'client_id' => 2
            ],
            [
                'date' => "2024-06-01",
                'delivery_status' => "DELIVERED",
                'client_id' => 1
            ]

        ]);

        DB::table('order_lines')->insert([
            [
                'order_id' => 1,
                'article_id' => 1,
                'price' => 50000,
                'quantity' => 10,
                'amount' => 500000
            ],
            [
                'order_id' => 2,
                'article_id' => 2,
                'price' => 50000,
                'quantity' => 14,
                'amount' => 500000
            ],
            [
                'order_id' => 3,
                'article_id' => 2,
                'price' => 1000,
                'quantity' => 9,
                'amount' => 1500
            ],
            [
                'order_id' => 4,
                'article_id' => 2,
                'price' => 2000,
                'quantity' => 14,
                'amount' => 20500
            ],

        ]);
    }
}
