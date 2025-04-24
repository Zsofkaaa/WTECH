<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;



class NavBarController extends Controller
{
    public function showAkcie(Request $request)
    {
        $sort = $request->query('sort', 'asc');
        $products = Product::where('is_discounted', true)
            ->with(['images' => fn($query) => $query->orderBy('filename')]);

        if ($sort === 'price_asc') {
            $products = $products->orderBy('price', 'asc');
        } elseif ($sort === 'price_desc') {
            $products = $products->orderBy('price', 'desc');
        } elseif ($sort === 'desc') {
            $products = $products->orderBy('name', 'desc');
        } else {
            $products = $products->orderBy('name', 'asc');
        }

        $products = $products->paginate(12);

        return view('shop', [
            'products' => $products,
            'categoryTitle' => 'Akcie',
        ]);
    }



    public function showNovinky(Request $request)
    {
        $sort = $request->query('sort', 'asc');

        $products = Product::where('is_new', true)
            ->with(['images' => fn($query) => $query->orderBy('filename')]);

        if ($sort === 'price_asc') {
            $products = $products->orderBy('price', 'asc');
        } elseif ($sort === 'price_desc') {
            $products = $products->orderBy('price', 'desc');
        } elseif ($sort === 'desc') {
            $products = $products->orderBy('name', 'desc');
        } else {
            $products = $products->orderBy('name', 'asc');
        }

        $products = $products->paginate(12);

        return view('shop', [
            'products' => $products,
            'categoryTitle' => 'Novinky',
        ]);
    }



    public function showBestSellers(Request $request)
    {
        $sort = $request->query('sort', 'asc');

        $products = Product::where('is_best_seller', true)
            ->with(['images' => fn($query) => $query->orderBy('filename')]);

        if ($sort === 'price_asc') {
            $products = $products->orderBy('price', 'asc');
        } elseif ($sort === 'price_desc') {
            $products = $products->orderBy('price', 'desc');
        } elseif ($sort === 'desc') {
            $products = $products->orderBy('name', 'desc');
        } else {
            $products = $products->orderBy('name', 'asc');
        }

        $products = $products->paginate(12);

        return view('shop', [
            'products' => $products,
            'categoryTitle' => 'Best sellers',
        ]);
    }



    public function showOblubene(Request $request)
    {
        $sort = $request->query('sort', 'asc');

        $products = Product::where('is_favorite', true)
            ->with(['images' => fn($query) => $query->orderBy('filename')]);

        if ($sort === 'price_asc') {
            $products = $products->orderBy('price', 'asc');
        } elseif ($sort === 'price_desc') {
            $products = $products->orderBy('price', 'desc');
        } elseif ($sort === 'desc') {
            $products = $products->orderBy('name', 'desc');
        } else {
            $products = $products->orderBy('name', 'asc');
        }

        $products = $products->paginate(12);

        return view('shop', [
            'products' => $products,
            'categoryTitle' => 'Tvoje obľúbené produkty',
        ]);
    }
}
