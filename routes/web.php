<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Order\EditController;
use App\Http\Controllers\Order\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    return view('payeer.test');
});

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::resource('games', GameController::class);
    Route::get('/', [GameController::class,'index'])->name('admin');
    Route::get('orders', IndexController::class)->name('orders.index');
    Route::put('orders/{order}', EditController::class)->name('orders.toggle');
    Route::delete('images/{image}', [ImageController::class, 'destroy'])->name('images.destroy');
});

Route::get('/', function () {return redirect('/market');})->name('market');
Route::get('/market/{any?}', function () {return view("market");})->where('any', '.*');

Auth::routes();
Route::get('/guest', [App\Http\Controllers\HomeController::class, 'index'])->name('notAdmin');
