<?php

namespace App\Http\Controllers;

use App\Models\Product;

class CartController extends Controller
{
    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'qty' => 1
            ];
        }

        session(['cart' => $cart]);

        return redirect('/cart');
    }

    public function index()
    {
        $cart = session('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function checkout()
    {
        session()->forget('cart');
        return view('cart.success');
    }
}
