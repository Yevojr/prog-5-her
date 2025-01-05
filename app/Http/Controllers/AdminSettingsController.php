<?php

namespace App\Http\Controllers;

use App\Models\AdminSettings;
use App\Models\Category;
use App\Models\Game;
use App\Models\Series;
use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->user() || !auth()->user()->is_admin)
        {
            return redirect('/')->with('error', 'Unauthorised user');
        }
        $games = Game::all();
        $series = Series::all();
        $categories = Category::all();
        return view('admin.index', compact('games', 'series', 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminSettings $adminSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminSettings $adminSettings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminSettings $adminSettings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminSettings $adminSettings)
    {
        //
    }
}
