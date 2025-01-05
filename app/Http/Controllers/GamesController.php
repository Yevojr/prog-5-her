<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\Games;
use App\Models\Series;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, string $category)
    {
        $categoryModel = Category::find($category);
        $games = Game::where('category_id', $categoryModel->id)->get();

        if (!$categoryModel)
        {
            abort(404);
        }
        return view('games.index', compact('games', 'categoryModel'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');

        $games = Game::where('category_id', $category)
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('release_date', 'LIKE', "%{$search}%");
            })->get();
        return view('games.search', compact('games', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create($userId)
    {
        $categories = Category::all();
        $user = $userId;

        return view('games.create', compact('categories', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'release_date' => 'required|date|date_format:d-m-Y',
            'category_id' => 'required|integer|exists:categories,id',
            'series_id' => 'required|integer|exists:series,id',
        ], [
            'image.required' => 'Put an image of the game box.',
            'name.required' => 'Fill in the title of the game.',
            'release_date.required' => 'select the release date.',
            'category_id.required' => 'Select the corresponding game genre.',
            'series_id.required' => 'Select the corresponding game series.',
        ]);

        $game = new Game();
        $game->name = $request->input('name');
        $game->release_date = \Carbon\Carbon::createFromFormat('d-m-Y',$request->input('release_date'))->format('Y-m-d');
        $game->category_id = $request->input('category_id');
        $game->series_id = $request->input('series_id');
        $game->user_id = auth()->user->id();

        if ($request->hasFile('image'))
        {
            $image = $request->file('image')->store('games', 'public');
            $game->image = $image;
        }
        $game->save();

        return redirect()->route('games.index')->with('success', 'Game created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id, $category = null)
    {
        $game = Game::findOrFail($id);
        $category = Category::find($game->category_id);
        return view('games.show', compact('game', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $game = Game::findOrFail($id);
        $categories = Category::all();
        $series = Series::all();
        return view('games.edit', compact('game', 'categories', 'series'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $game = Game::findOrFail($id);
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'release_date' => 'required|date|date_format:d-m-Y',
            'category_id' => 'required|integer|exists:categories,id',
            'series_id' => 'required|integer|exists:series,id',
        ], [
            'image.required' => 'Put an image of the game box.',
            'name.required' => 'Fill in the title of the game.',
            'release_date.required' => 'select the release date.',
            'category_id.required' => 'Select the corresponding game genre.',
            'series_id.required' => 'Select the corresponding game series.',
        ]);
        $game->update($request->all());

        return redirect()->route('games.index');
    }

    public function visibility($id)
    {
        $game = Game::findOrFail($id);
        if ($game){
            $game->visibility = !$game->visibility;
            $game->save();

            return redirect()->back()->with('success', 'Game visibility updated successfully.');
        }
        return redirect()->back()->with('fail', 'Game not found.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $game = Game::findOrFail($id);
        $game->delete();
        return redirect()->route('games.index');
    }
}
