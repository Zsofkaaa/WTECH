<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return view('shop', [
            'categoryTitle' => $categoryTitle
            // 'products' => Product::where('discount', '>', 0)->get()
        ]);
    }
}
