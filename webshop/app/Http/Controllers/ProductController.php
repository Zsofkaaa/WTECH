<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;  


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
        
        // Ha nincs bejelentkezve, a kosarat a session-ban tároljuk
        if (!Auth::check()) {
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
        } else {
            // Ha be vagy jelentkezve, az adatbázisba mentjük a kosarat
            $cart = \App\Models\Cart::where('user_id', auth()->id())->first();
            if ($cart) {
                $cartItems = json_decode($cart->items, true);
            } else {
                $cartItems = [];
            }

            // Hozzáadjuk a terméket a kosárhoz
            if (isset($cartItems[$id])) {
                $cartItems[$id]['quantity']++;
            } else {
                $cartItems[$id] = [
                    'name' => $product->name,
                    'quantity' => 1,
                    'price' => $product->price,
                    'image' => $product->images->first()->filename ?? 'placeholder.jpg'
                ];
            }

            // Frissítjük vagy létrehozzuk a kosarat
            \App\Models\Cart::updateOrCreate(
                ['user_id' => auth()->id()],
                ['items' => json_encode($cartItems)]
            );
        }

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
        $this->saveCartToDatabase(); 
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
        $this->saveCartToDatabase(); 
        return redirect()->back();
    }
    private function saveCartToDatabase()
    {
        if (auth()->check()) {
            \App\Models\Cart::updateOrCreate(
                ['user_id' => auth()->id()],
                ['items' => json_encode(session('cart', []))]
            );
        }
    }   
}