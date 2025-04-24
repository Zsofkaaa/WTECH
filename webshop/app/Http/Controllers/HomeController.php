<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Termékek lekérése különböző szekciók szerint
        $productsBySection = [
            'Akcie' => Product::where('is_discounted', true)->get(), // Minden kedvezményes termék
            'Novinky' => Product::where('is_new', true)->get(), // Minden új termék
            'Best sellers' => Product::where('is_best_seller', true)->get(), // Minden bestseller termék
        ];

        return view('home', [
            'sections' => array_keys($productsBySection), // A szekciók nevei
            'productsBySection' => $productsBySection, // A termékek csoportosítása
        ]);
    }
}
