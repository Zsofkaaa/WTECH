<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['name' => 'Activity', 'price' => 23.90, 'is_discounted' => true, 'discounted_price' => 19.90],
            ['name' => 'Bang', 'price' => 20.99, 'is_best_seller' => true],
            ['name' => 'Blafuj', 'price' => 10.00, 'is_new' => true],
            ['name' => 'Brainbox abc', 'price' => 17.99, 'is_best_seller' => true],
            ['name' => 'Citadela', 'price' => 17.89, 'is_new' => true],
            ['name' => 'Človeče', 'price' => 6.99, 'is_discounted' => true, 'discounted_price' => 5.99],
            ['name' => 'Cortex', 'price' => 14.99, 'is_best_seller' => true],
            ['name' => 'Desiatka', 'price' => 20.50, 'is_new' => true],
            ['name' => 'Dixit', 'price' => 19.99, 'is_best_seller' => true],
            ['name' => 'Dobble', 'price' => 6.50, 'is_new' => true],
            ['name' => 'Domino', 'price' => 4.99, 'is_discounted' => true, 'discounted_price' => 3.99],
            ['name' => 'Exploding Kittens', 'price' => 24.99, 'is_best_seller' => true],
            ['name' => 'Fabio', 'price' => 9.50, 'is_new' => true],
            ['name' => 'Iq Link', 'price' => 11.99, 'is_best_seller' => true],
            ['name' => 'Jenga', 'price' => 8.50, 'is_new' => true],
            ['name' => 'Meme', 'price' => 30.00, 'is_discounted' => true, 'discounted_price' => 25.00],
            ['name' => 'Monopoly', 'price' => 40.00, 'is_best_seller' => true],
            ['name' => 'Pexesohm', 'price' => 7.50, 'is_new' => true],
            ['name' => 'Puzzle Kvet', 'price' => 9.99, 'is_best_seller' => true],
            ['name' => 'Puzzle Lalia', 'price' => 10.50, 'is_new' => true],
            ['name' => 'Saboter', 'price' => 10.99, 'is_discounted' => true, 'discounted_price' => 8.99],
            ['name' => 'Scrabble', 'price' => 9.99, 'is_best_seller' => true],
            ['name' => 'Túry mury', 'price' => 7.50, 'is_new' => true],
            ['name' => 'Uno Deluxe', 'price' => 9.09, 'is_best_seller' => true],
        ];

        $allCategories = Category::all();

        foreach ($products as $data) {
            $product = Product::create(array_merge([
                'description' => 'Popis hry',
                'min_age' => 6,
                'min_players' => 2,
                'max_players' => 6,
                //'category' => 'Rodinné'
            ], $data));

            $slugName = Str::slug($product->name);

            // 1.jpg
            ProductImage::create([
                'product_id' => $product->id,
                'filename' => $slugName . '1.jpg'
            ]);

            // 2.jpg
            ProductImage::create([
                'product_id' => $product->id,
                'filename' => $slugName . '2.jpg'
            ]);
            $category = Category::where('slug', 'rodinne')->first();
            $product->categories()->attach($category->id);
            
        }
    }
}