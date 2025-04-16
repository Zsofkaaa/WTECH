<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavBarController extends Controller
{
    public function showAkcie()
    {
        return view('shop', [
            'categoryTitle' => 'Akcie',
            // 'products' => Product::where('discount', '>', 0)->get()
        ]);
    }

    public function showNovinky()
    {
        return view('shop', [
            'categoryTitle' => 'Novinky',
            // 'products' => Product::latest()->take(10)->get()
        ]);
    }

    public function showBestSellers()
    {
        return view('shop', [
            'categoryTitle' => 'Best sellers',
            // 'products' => Product::orderBy('sales_count', 'desc')->take(10)->get()
        ]);
    }

    public function showOblubene()
    {
        return view('shop', [
            'categoryTitle' => 'Tvoje obľúbené produkty',
            // 'products' => Product::where('discount', '>', 0)->get()
        ]);
    }
}