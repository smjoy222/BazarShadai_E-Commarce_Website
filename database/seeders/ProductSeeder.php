<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'id' => 1,
                'category' => 'fruits',
                'name' => 'Orange (Komola)',
                'price' => 100.00,
                'rating' => 4,
                'image' => 'orange.png'
            ],
            [
                'id' => 2,
                'category' => 'veg',
                'name' => 'Green Peas (Motorshuti)',
                'price' => 40.00,
                'rating' => 4,
                'image' => 'green peas.png'
            ],
            [
                'id' => 3,
                'category' => 'meats',
                'name' => 'Beef (Gorur Mangsho)',
                'price' => 650.00,
                'rating' => 4,
                'image' => 'beef.png'
            ],
            [
                'id' => 4,
                'category' => 'dairy',
                'name' => 'Farm Eggs (Dim)',
                'price' => 120.00,
                'rating' => 5,
                'image' => 'eggs.png'
            ],
            [
                'id' => 5,
                'category' => 'veg',
                'name' => 'Potato (Alu)',
                'price' => 50.00,
                'rating' => 4,
                'image' => 'alu.png'
            ],
            [
                'id' => 6,
                'category' => 'sea-food',
                'name' => 'Fresh Salmon',
                'price' => 1200.00,
                'rating' => 5,
                'image' => 'salmon.png'
            ],
            [
                'id' => 7,
                'category' => 'veg',
                'name' => 'Fresh Broccoli',
                'price' => 80.00,
                'rating' => 4,
                'image' => 'brocoli.png'
            ],
            [
                'id' => 8,
                'category' => 'veg',
                'name' => 'Beetroot (Bit)',
                'price' => 60.00,
                'rating' => 4,
                'image' => 'beetroot.png'
            ]
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['id' => $product['id']],
                $product
            );
        }
    }
}
