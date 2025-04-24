<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;



class SearchController extends Controller
{
    private function removeAccents($string)
    {
        return iconv('UTF-8', 'ASCII//TRANSLIT', $string);
    }



    public function index(Request $request)
    {
        $query = $request->input('query');
        $normalizedQuery = strtolower($this->removeAccents($query));
        $productsCollection = Product::all()->filter(function ($product) use ($normalizedQuery) {
            $normalizedName = strtolower($this->removeAccents($product->name));
            return str_contains($normalizedName, $normalizedQuery);
        });
        $perPage = 12;
        $currentPage = request()->get('page', 1);
        $currentItems = $productsCollection->slice(($currentPage - 1) * $perPage, $perPage)->values();
        $products = new LengthAwarePaginator(
            $currentItems,
            $productsCollection->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $categoryTitle = "Výsledky hľadania pre: \"$query\"";

        return view('shop', [
            'products' => $products,
            'categoryTitle' => $categoryTitle
        ]);
    }
}
