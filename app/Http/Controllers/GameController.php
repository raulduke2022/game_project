<?php

namespace App\Http\Controllers;

use App\Http\Middleware\ValidateGameInput;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Image;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware(ValidateGameInput::class)->only('store', 'update');
    }

    public function index()
    {
        $games = Game::orderBy('created_at', 'desc')->paginate(10);
        return view('admin/index', compact('games'));
    }

    public function create()
    {
        return view('admin/create');
    }

    public function store(Request $request)
    {
        $game = Game::firstOrCreate([
            'key' => request('key'),
            'title' => request('title')
        ]);

        $files = $request->file('attachment');

        if ($request->hasFile('attachment')) {
            foreach ($files as $file) {
                $destination = $file->store('public/games/' . $game->id);
                $imagePath = str_replace('public/', '', $destination);
                Image::create([
                        'path' => $imagePath,
                        'game_id' => $game->id,
                        'title' => $file->getClientOriginalName()
                    ]
                );
            }
        }

        session()->flash('success', 'Запись успешно создана');
        return redirect(route('games.index'));
    }


    public function show(Game $game)
    {
        $images = $game->images;
        return view('admin/show', compact('game', 'images'));
    }

    public function edit(Game $game)
    {
        return view('admin/edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $game->update($request->all());
        session()->flash('success', 'Запись успешно обновлена');
        return redirect()->back();
    }

    public function destroy(Game $game)
    {
        $game->delete();
        session()->flash('success', 'Запись успешно удалена');
        return redirect()->back();
    }
}
