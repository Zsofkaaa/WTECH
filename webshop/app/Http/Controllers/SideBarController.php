<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;



class SideBarController extends Controller
{
    public function showCategory($category)
    {
        $categories = [
            'strategia' => 'Štrategické hry',
            'puzzle' => 'Puzzle',
            'party' => 'Party hry',
            'vedomostne' => 'Vedomostné hry',
            'karty' => 'Kartové hry',
            'rodinne' => 'Rodinné hry',
            'deti' => 'Pre deti',
            'pamat' => 'Pamäťové hry'
        ];

        $categoryTitle = $categories[$category] ?? 'Neznáma kategória';

        $products = Product::where('category', $category)
            ->with(['images' => fn($query) => $query->orderBy('filename')])
            ->paginate(12);

        return view('shop', [
            'products' => $products,
            'categoryTitle' => $categoryTitle
        ]);
    }
}
