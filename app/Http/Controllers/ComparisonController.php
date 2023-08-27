<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ComparisonController extends Controller
{
    public function index()
    {
        $productIdsInComparison = session()->get('comparison', []);
        $productsInComparison = Product::whereIn('id', $productIdsInComparison)->get();

        return view('comparison.index', compact('productsInComparison'));
    }

    public function addToComparison(Request $request)
    {
        $productId = $request->input('product_id');

        $productsInComparison = session()->get('comparison', []);

        if (!in_array($productId, $productsInComparison)) {
            $productsInComparison[] = $productId;
            session()->put('comparison', $productsInComparison);
        }

        return redirect()->back()->with('success', 'Товар добавлен в сравнение.');
    }

    public function removeFromComparison(Request $request)
    {
        $productId = $request->input('product_id');
        $productsInComparison = session()->get('comparison', []);

        $updatedComparison = array_diff($productsInComparison, [$productId]);
        session()->put('comparison', $updatedComparison);

        return redirect()->back()->with('success', 'Товар удален из сравнения.');
    }
}
