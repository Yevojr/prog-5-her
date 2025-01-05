<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\Series;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $games = Game::with('series')
            ->where('visibility', true)
            ->get();
        $series = Series::all();

        return view('games.index', compact('games', 'series'));
    }

    public function search(Request $request)
    {
        $searchText = $request->input('query');
        $seriesId = $request->input('series_id');

        $games = Game::query();

        if($searchText) {
            $games->where(function ($query) use ($searchText) {
               $query->where('name', 'LIKE', '%' . $searchText . '%');
            });
        }

        if($seriesId) {
            $games->where('series_id', $seriesId);
        }

        $games = $games->get();
        $series = Series::all();
        return view('games.index', compact('games', 'series'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create($userId)
    {
        $categories = Category::all();
        $series = Series::all();
        $user = $userId;

        return view('games.create', compact('categories', 'series', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'release_date' => 'required|date',
            'category_id' => 'required|integer|exists:categories,id',
            'series_id' => 'required|integer|exists:series,id',
        ], [
            'image.required' => 'Put an image of the game box.',
            'name.required' => 'Fill in the title of the game.',
            'release_date.required' => 'select the release date.',
            'category_id.required' => 'Select the corresponding category.',
            'series_id.required' => 'Select the corresponding game series.',
        ]);

        $game = new Game();
        $game->name = $request->input('name');
        $game->release_date = $request->input('release_date');
        $game->category_id = $request->input('category_id');
        $game->series_id = $request->input('series_id');
        $game->user_id = auth()->user()->id;

        if ($request->hasFile('image'))
        {
            $image = $request->file('image')->store('games', 'public');
            $game->image = $image;
        }
        $game->save();

        return redirect()->route('games.index')->with('success', 'Game added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $game = Game::findOrFail($id);
        $category = Category::find($game->category_id);
        $series = Series::find($game->series_id);
        return view('games.show', compact('game', 'category', 'series'));
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
            'release_date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'series_id' => 'required|exists:series,id',
        ], [
            'image.required' => 'Put an image of the game box.',
            'name.required' => 'Fill in the title of the game.',
            'release_date.required' => 'select the release date.',
            'category_id.required' => 'Select the corresponding category.',
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
        if(!auth()->check() || !auth()->user()->is_admin){

            return redirect()->route('/')->with('error', 'Unauthorised user');
        }

        $game = Game::findOrFail($id);
        $game->delete();
        return redirect()->route('admin.index')->with('success', 'Game deleted successfully.');
    }
}
