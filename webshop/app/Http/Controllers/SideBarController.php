<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category; 

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

        $category = Category::where('slug', $category)->first();
        
        if (!$category) {
            abort(404); 
        }

        $products = $category->products() 
            ->with(['images' => fn($query) => $query->orderBy('filename')]) // Képlekérdezés
            ->paginate(12); 

        return view('shop', [
            'products' => $products,
            'categoryTitle' => $categoryTitle,
            'categorySlug' => $category
        ]);
    }
}
