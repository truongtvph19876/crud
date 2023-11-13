<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'IPhone 14 Pro Max',
                'price' => 29000000,
                'description' => 'Description IPhone 14',
                'quantity' => 100,
                'status' => 1,
                'image' => 'assets/images/default-1.jpg'
            ],
            [
                'name' => 'Samsung Galaxy S23',
                'price' => 15900000,
                'description' => 'Description Samsung Galaxy S23',
                'quantity' => 200,
                'status' => 0,
                'image' => 'assets/images/default-2.jpg'
            ],
            [
                'name' => 'Xiaomi 12 5G',
                'price' => 9000000,
                'description' => 'Description Xiaomi 12 5G',
                'quantity' => 150,
                'status' => 1,
                'image' => 'assets/images/default-3.jpg'
            ],
        ];

        foreach ($products as $product) {
            Products::create($product);
        }
    }
}
