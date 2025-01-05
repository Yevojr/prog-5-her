<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = Series::all();
        return view('series.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $series = Series::all();
        $user = auth()->user();
        return view('series.create', compact('series'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Please enter a series name',
        ]);

        $serie = new Series();
        $serie->name = $request->input('name');
        $serie->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $serie = Series::findOrFail($id);
        return view('series.show', compact('serie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $serie = Series::findOrFail($id);
        return view('series.edit', compact('serie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $serie = Series::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Please enter a series name',
        ]);
        $serie->update($request->all());
        return redirect()->route('series.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $serie = Series::findOrFail($id);
        $serie->delete();
        return redirect()->route('series.index');
    }
}
