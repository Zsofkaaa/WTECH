<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $productsBySection = [
            'Akcie' => Product::where('is_discounted', true)->take(3)->get(),
            'Novinky' => Product::where('is_new', true)->take(3)->get(),
            'Best sellers' => Product::where('is_best_seller', true)->take(3)->get(),
        ];

        return view('home', [
            'sections' => array_keys($productsBySection),
            'productsBySection' => $productsBySection,
        ]);
    }


    public function home()
    {
        $akcie = Product::where('is_discounted', true)->get();
        $novinky = Product::where('is_new', true)->get();
        $bestSellers = Product::where('is_best_seller', true)->get();

        return view('home', compact('akcie', 'novinky', 'bestSellers'));
    }
}
