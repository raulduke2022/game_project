<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Image\BaseController;
use App\Http\Middleware\ValidateGameInput;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Image;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use App\Services\Image\Service;

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

    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $game = Game::Create($request->only([
                    'key',
                    'title',
                    'description',
                    'price'
                ]));

                $files = $request->file('attachment');

                if ($request->hasFile('attachment')) {
                    foreach ($files as $file) {
                        $destination = $file->store('public/games/' . $game->id);
                        $imagePath = str_replace('public/', '', $destination);
                        Image::create([
                            'path' => $imagePath,
                            'game_id' => $game->id,
                            'title' => $file->getClientOriginalName()
                        ]);
                    }
                }
            });

            Artisan::call('storage:link');
            session()->flash('success', 'Запись успешно создана');
            return redirect(route('games.index'));
        } catch (\Exception $e) {
            session()->flash('error', 'Ошибка при создании записи: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
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

    public function update(Request $request, Game $game)
    {
        $game->update($request->all());
        session()->flash('success', 'Запись успешно обновлена');
        return redirect()->back();
    }

    public function destroy(Game $game)
    {
        foreach($game->images as $image)
            $this->service->delete($image);

        $game->delete();
        session()->flash('success', 'Запись успешно удалена');
        return redirect()->back();
    }
}
