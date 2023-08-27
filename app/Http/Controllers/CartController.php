<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        return view('cart.index', compact('cart'));
    }

    public function searchForm()
    {
        return view('cart.search');
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');


        $product = Product::find($productId);

        if ($product) {
            $cartItem = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
            ];

            session()->push('cart', $cartItem);

            return redirect('/cart')->with('success', 'Товар добавлен');
        } else {
            return redirect('/cart')->with('error', 'Товар не найден.');
        }
    }
}
