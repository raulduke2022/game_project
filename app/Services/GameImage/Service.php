<?php

namespace App\Services\GameImage;

use App\Http\Requests\GameRequest;
use App\Models\Game;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function delete($image)
    {
        if (Storage::disk('public')->exists($image->path)) {
            Storage::disk('public')->delete($image->path);
        }
        $image->delete();
    }

    public function createOrUpdate(GameRequest $request, Game $game = null)
    {
        $data = $request->all();
        try {
            DB::transaction(function () use ($request, $game, $data) {
                if ($game) {
                    $game->update([
                        'introduction' => $data['introduction'],
                        'title' => $data['title'],
                        'description' => $data['description'],
                        'price' => (int) $data['price'] * env('CURR_CENTS', 100),
                    ]);
                } else {
                    $game = Game::create([
                        'introduction' => $data['introduction'],
                        'title' => $data['title'],
                        'description' => $data['description'],
                        'price' => (int) $data['price'] * env('CURR_CENTS', 100),
                    ]);
                }

                $files = $request->file('attachment');
                if ($request->hasFile('attachment')) {
                    foreach ($files as $file) {
                        $destination = $file->store('public/games/' . $game->id);
                        $imagePath = str_replace('public/', 'storage/', $destination);
                        Image::create([
                            'path' => $imagePath,
                            'game_id' => $game->id,
                            'title' => $file->getClientOriginalName(),
                        ]);
                    }
                }
            });

//            Artisan::call('storage:link');
            session()->flash('success', 'Запись успешно ' . ($game ? 'обновлена' : 'создана'));
            return redirect($game ? route('games.edit', $game->id) : route('games.index'));
        } catch (\Exception $e) {
            session()->flash('error', 'Ошибка при ' . ($game ? 'обновлении' : 'создании') . ' записи: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }
}
