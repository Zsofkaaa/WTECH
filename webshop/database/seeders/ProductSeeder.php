<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['name' => 'Túry Múry', 'price' => 12.99, 'is_discounted' => true],
            ['name' => 'Blafuj', 'price' => 9.99, 'is_best_seller' => true],
            ['name' => 'Človeče', 'price' => 7.50, 'is_new' => true],
            ['name' => 'Blafuj', 'price' => 9.99, 'is_best_seller' => true],
            ['name' => 'Človeče', 'price' => 7.50, 'is_new' => true],
            ['name' => 'Túry Múry', 'price' => 12.99, 'is_discounted' => true],
            ['name' => 'Blafuj', 'price' => 9.99, 'is_best_seller' => true],
            ['name' => 'Človeče', 'price' => 7.50, 'is_new' => true],
            ['name' => 'Blafuj', 'price' => 9.99, 'is_best_seller' => true],
            ['name' => 'Človeče', 'price' => 7.50, 'is_new' => true],
            ['name' => 'Túry Múry', 'price' => 12.99, 'is_discounted' => true],
            ['name' => 'Blafuj', 'price' => 9.99, 'is_best_seller' => true],
            ['name' => 'Človeče', 'price' => 7.50, 'is_new' => true],
            ['name' => 'Blafuj', 'price' => 9.99, 'is_best_seller' => true],
            ['name' => 'Človeče', 'price' => 7.50, 'is_new' => true],
            ['name' => 'Túry Múry', 'price' => 12.99, 'is_discounted' => true],
            ['name' => 'Blafuj', 'price' => 9.99, 'is_best_seller' => true],
            ['name' => 'Človeče', 'price' => 7.50, 'is_new' => true],
            ['name' => 'Blafuj', 'price' => 9.99, 'is_best_seller' => true],
            ['name' => 'Človeče', 'price' => 7.50, 'is_new' => true],
            ['name' => 'Túry Múry', 'price' => 12.99, 'is_discounted' => true],
            ['name' => 'Blafuj', 'price' => 9.99, 'is_best_seller' => true],
            ['name' => 'Človeče', 'price' => 7.50, 'is_new' => true],
            ['name' => 'Blafuj', 'price' => 9.99, 'is_best_seller' => true],
            ['name' => 'Človeče', 'price' => 7.50, 'is_new' => true],
            ['name' => 'Túry Múry', 'price' => 12.99, 'is_discounted' => true],
            ['name' => 'Blafuj', 'price' => 9.99, 'is_best_seller' => true],
            ['name' => 'Človeče', 'price' => 7.50, 'is_new' => true],
            ['name' => 'Blafuj', 'price' => 9.99, 'is_best_seller' => true],
            ['name' => 'Človeče', 'price' => 7.50, 'is_new' => true],
            ['name' => 'Túry Múry', 'price' => 12.99, 'is_discounted' => true],
            ['name' => 'Blafuj', 'price' => 9.99, 'is_best_seller' => true],
            ['name' => 'Človeče', 'price' => 7.50, 'is_new' => true],
            ['name' => 'Blafuj', 'price' => 9.99, 'is_best_seller' => true],
            ['name' => 'Človeče', 'price' => 7.50, 'is_new' => true],
            // Add többit is
        ];

        foreach ($products as $data) {
            $product = Product::create(array_merge([
                'description' => 'Popis hry',
                'min_age' => 6,
                'min_players' => 2,
                'max_players' => 6,
                'category' => 'Rodinné'
            ], $data));

            // Feltételezzük, hogy a képek így néznek ki: "tury-mury1.jpg"
            $slugName = Str::slug($product->name);
            $imageFilename = $slugName . '1.jpg';

            // Feltételezve, hogy a képfájlok már a public/Pictures mappában vannak
            ProductImage::create([
                'product_id' => $product->id,
                'filename' => $imageFilename
            ]);
        }
    }
}
