<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Characteristic;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     *
     */
    public function create()
    {
        $characteristics = Characteristic::all();
        return view('products.create', compact('characteristics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(ProductRequest $request)
    {

        $validate = $request->validated();
        $product = Product::create([
            'name' => $validate['name'],
            'description' => $validate['description'],
            'price' => $validate['price'],
        ]);

        $characteristics = array_values($request->input('characteristics'));
        $values = array_values($request->input('values'));;
        foreach ($characteristics as $index => $characteristicId) {
            $value = $values[$index];
            $product->characteristics()->attach($characteristicId, ['value' => $value]);
        }

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Product $product)
    {
        return view('products.update', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(ProductRequest $request, Product $product)
    {
        $validated = $request->validated();
        $product->update($validated);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
