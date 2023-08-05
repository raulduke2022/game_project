<?php

use App\Http\Controllers\{
    ConfigController,
    GameController,
    ImageController,
    Order\EditController,
    Order\IndexController,
    Order\ShowController,
    PayeerController
};

use Illuminate\Support\Facades\{
    Auth,
    Route
};

Route::get('/payment/{game}/{order}', [PayeerController::class, 'payment']);
Route::post('/handler', [PayeerController::class, 'handle']);
Route::get('/success', [PayeerController::class, 'success']);
Route::get('/fail', [PayeerController::class, 'fail']);


Route::prefix('admin')->middleware('admin')->group(function () {
    Route::resource('games', GameController::class);
    Route::resource('configs', ConfigController::class);
    Route::get('/', [GameController::class, 'index'])->name('admin');
    Route::get('orders', IndexController::class)->name('orders.index');
    Route::put('orders/{order}', EditController::class)->name('orders.toggle');
    Route::get('orders/{order}', ShowController::class)->name('orders.show');
    Route::delete('images/{image}', [ImageController::class, 'destroy'])->name('images.destroy');
});

Route::get('/', function () {
    return redirect('/market');
})->name('market');
Route::get('/market/{any?}', function () {
    return view("market");
})->where('any', '.*');

Auth::routes();
Route::get('/guest', [App\Http\Controllers\HomeController::class, 'index'])->name('notAdmin');
