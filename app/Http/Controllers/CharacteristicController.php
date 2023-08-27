<?php

namespace App\Http\Controllers;

use App\Http\Requests\CharacteristicRequest;
use App\Models\Characteristic;
use Illuminate\Http\Request;

class CharacteristicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $characteristics = Characteristic::all();
        return view('characteristics.index', compact('characteristics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('characteristics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(CharacteristicRequest $request)
    {
        $validate = $request->validated();
        Characteristic::create($validate);
        return redirect()->route('characteristic.index');

    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Characteristic $characteristic)
    {
        return view('characteristics.show', compact('characteristic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Characteristic $characteristic)
    {
        return view('characteristics.update', compact('characteristic'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(CharacteristicRequest $request, Characteristic $characteristic)
    {
        $validated = $request->validated();
        $characteristic->update($validated);
        return view('characteristics.update', compact('characteristic'));
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Characteristic $characteristic)
    {
        $characteristic->delete();
        return redirect()->route('characteristics.index');
    }
}
