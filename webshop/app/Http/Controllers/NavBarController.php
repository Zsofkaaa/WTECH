<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class NavBarController extends Controller
{
    public function showAkcie()
    {
        $products = Product::where('is_discounted', true)
            ->with(['images' => fn($query) => $query->orderBy('filename')])
            ->paginate(12);

        return view('shop', [
            'products' => $products,
            'categoryTitle' => 'Akcie',
        ]);
    }

    public function showNovinky()
    {
        $products = Product::where('is_new', true)
            ->with(['images' => fn($query) => $query->orderBy('filename')])
            ->paginate(12);

        return view('shop', [
            'products' => $products,
            'categoryTitle' => 'Novinky',
        ]);
    }

    public function showBestSellers()
    {
        $products = Product::where('is_best_seller', true)
            ->with(['images' => fn($query) => $query->orderBy('filename')])
            ->paginate(12);

        return view('shop', [
            'products' => $products,
            'categoryTitle' => 'Best sellers',
        ]);
    }

    public function showOblubene()
    {
        $products = Product::where('is_favorite', true) // csak ha van ilyen mező
            ->with(['images' => fn($query) => $query->orderBy('filename')])
            ->paginate(12);

        return view('shop', [
            'products' => $products,
            'categoryTitle' => 'Tvoje obľúbené produkty',
        ]);
    }
}
