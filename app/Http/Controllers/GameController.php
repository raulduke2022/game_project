<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameUpdateRequest;
use App\Models\Game;

class GameController extends BaseController
{
    public function index()
    {
        $games = Game::orderBy('created_at', 'desc')->paginate(10);
        return view('admin/index', compact('games'));
    }

    public function create()
    {
        return view('admin/create');
    }

    public function store(GameUpdateRequest $request)
    {
        return $this->service->createOrUpdate($request);
    }

    public function show(Game $game)
    {
        $images = $game->images;
        return view('admin/show', compact('game', 'images'));
    }

    public function edit(Game $game)
    {
        $images = $game->images;
        return view('admin/edit', compact('game', 'images'));
    }

    public function update(GameUpdateRequest $request, Game $game)
    {
        return $this->service->createOrUpdate($request, $game);
    }

    public
    function destroy(Game $game)
    {
        foreach ($game->images as $image)
            $this->service->delete($image);

        $game->delete();
        session()->flash('success', 'Запись успешно удалена');
        return redirect()->back();
    }
}
