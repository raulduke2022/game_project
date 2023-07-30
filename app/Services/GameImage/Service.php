<?php

namespace App\Services\GameImage;

use App\Http\Requests\GameUpdateRequest;
use App\Models\Game;
use App\Models\Image;
use Illuminate\Support\Facades\Artisan;
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

    public function createOrUpdate(GameUpdateRequest $request, Game $game = null)
    {
        try {
            DB::transaction(function () use ($request, $game) {
                if ($game) {
                    $game->update($request->only([
                        'key',
                        'title',
                        'description',
                        'price',
                    ]));
                } else {
                    $game = Game::create($request->only([
                        'key',
                        'title',
                        'description',
                        'price',
                    ]));
                }

                $files = $request->file('attachment');
                if ($request->hasFile('attachment')) {
                    foreach ($files as $file) {
                        $destination = $file->store('public/games/' . $game->id);
                        $imagePath = str_replace('public/', '', $destination);
                        Image::create([
                            'path' => $imagePath,
                            'game_id' => $game->id,
                            'title' => $file->getClientOriginalName(),
                        ]);
                    }
                }
            });

            Artisan::call('storage:link');
            session()->flash('success', 'Запись успешно ' . ($game ? 'обновлена' : 'создана'));
            return redirect($game ? route('games.show', $game->id) : route('games.index'));
        } catch (\Exception $e) {
            session()->flash('error', 'Ошибка при ' . ($game ? 'обновлении' : 'создании') . ' записи: ' . $e->getMessage());
            return redirect()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }
}
