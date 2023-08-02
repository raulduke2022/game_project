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

    public function __construct() {
        $this->middleware(ValidateGameData::class)->only('create', 'store', 'update');
    }

    public function index() :JsonResponse
    {
        $games = DB::table('games')->paginate(9);
        return response()->json($games);
    }

//    public function store(Request $request) :JsonResponse
//    {
//        $game = Game::create($request->all());
//        return response()->json($game, 201);
//    }


    public function show(Game $game) :JsonResponse
    {
        $game->load('images');
        return response()->json($game);
    }


//    public function update(Request $request, Game $game) :JsonResponse
//    {
//        $validatedData = $request->all();
//
//        $game->update($validatedData);
//        return response()->json($game);
//    }


//    public function destroy(Game $game) :JsonResponse
//    {
//        $game->delete();
//        return response()->json(null, 204);
//    }
}
