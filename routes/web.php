<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::resource('games', GameController::class);
    Route::get('/', [GameController::class,'index'])->name('admin');
});

Route::get('/', function () {return redirect('/market');})->name('market');
Route::get('/market/{any?}', function () {return view("market");})->where('any', '.*');



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
