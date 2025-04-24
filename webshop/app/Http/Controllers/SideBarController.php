<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class SideBarController extends Controller
{
    public function showCategory(Request $request, $category)
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

        // Szűrők
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $sort = $request->input('sort', 'default');

        // Termékek lekérdezése
        $productsQuery = $category->products()->with(['images' => fn($query) => $query->orderBy('filename')]);

        // Ár szűrés
        if (!is_null($minPrice)) {
            $productsQuery->where('price', '>=', $minPrice);
        }

        if (!is_null($maxPrice)) {
            $productsQuery->where('price', '<=', $maxPrice);
        }

        // Rendezés
        switch ($sort) {
            case 'price_asc':
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $productsQuery->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $productsQuery->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $productsQuery->orderBy('name', 'desc');
                break;
            default:
                $productsQuery->orderBy('created_at', 'desc');
                break;
        }

        $products = $productsQuery->paginate(12)->appends($request->query()); // Megőrzi query paramétereket a lapozásnál

        return view('shop', [
            'products' => $products,
            'categoryTitle' => $categoryTitle,
            'categorySlug' => $category,
            'sort' => $sort,
        ]);
    }
}
