<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Middleware\ValidateGameData;
use App\Models\Game;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GamesController extends Controller
{
    public function index() :JsonResponse
    {
        $games = Game::with('images')->paginate(9);
        return response()->json($games);
    }

    public function show(Game $game) :JsonResponse
    {
        $game->load('images');
        return response()->json($game);
    }
}
