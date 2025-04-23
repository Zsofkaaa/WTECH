<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $product = Product::with(['images' => function($query) {
            $query->orderBy('filename');
        }])->findOrFail($id);

        return view('detaily', [
            'product' => $product
        ]);
    }



    public function index()
    {
        $products = Product::with(['images' => function($query) {
            $query->orderBy('filename');
        }])->paginate(12);

        return view('shop', [
            'products' => $products,
            'categoryTitle' => 'Všetky produkty'
        ]);
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->images->first()->filename ?? 'placeholder.jpg'
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function toggleFavorite($id)
    {
        $product = Product::findOrFail($id);
        $product->is_favorite = !$product->is_favorite;
        $product->save();

        return redirect()->back();
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function updateCartQuantity(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($request->action === 'increase') {
                $cart[$id]['quantity']++;
            } elseif ($request->action === 'decrease' && $cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            }
        }

        session()->put('cart', $cart);
        return redirect()->back();
    }
}
