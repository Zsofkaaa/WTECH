<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // KÉSŐBB EZT ADATBÁZISBÓL KELL LEKÉRNI
        $products = [
            1 => ['name' => 'Túry Múry', 'image' => 'tury mury.jpg', 'price' => 12.99, 'description' => ''],
            2 => ['name' => 'Blafuj', 'image' => 'blafuj.webp', 'price' => 9.99, 'description' => ''],
            3 => ['name' => 'Človeče', 'image' => 'clovece.jpg', 'price' => 7.50, 'description' => ''],
            4 => ['name' => 'Bang', 'image' => 'bang.jpg', 'price' => 12.99, 'description' => ''],
            5 => ['name' => 'Dixit', 'image' => 'dixit.webp', 'price' => 9.99, 'description' => ''],
            6 => ['name' => 'Monopoly', 'image' => 'monopoly.webp', 'price' => 7.50, 'description' => ''],
            7 => ['name' => 'Activity', 'image' => 'activity.webp', 'price' => 12.99, 'description' => ''],
            8 => ['name' => 'Uno Deluxe', 'image' => 'uno deluxe.jpg', 'price' => 9.99, 'description' => ''],
            9 => ['name' => 'Exploding kittens', 'image' => 'exploding kittens.webp', 'price' => 7.50, 'description' => ''],
        ];

        if (!isset($products[$id])) {
            abort(404, 'Termék nem található');
        }

        return view('detaily', [
            'product' => $products[$id]
        ]);
    }
}
