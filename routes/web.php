<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;


Route::prefix('admin')->group(function () {
    Route::get('/', [GameController::class,'index'])->name('admin');
});

Route::get('/', function () {return redirect('/market');})->name('market');
Route::get('/market/{any?}', function () {return view("market");})->where('any', '.*');

Route::resource('games', GameController::class);


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
