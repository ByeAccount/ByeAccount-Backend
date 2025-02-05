<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//    return $request->user();
// })->middleware('auth:sanctum');

/*
|--------------------------------------------------------------------------
| Website routes
|--------------------------------------------------------------------------
*/
Route::prefix('websites')
    ->as('website.')
    ->group(static function (): void {
        Route::get('/{id}', \App\Http\Controllers\Website\ShowController::class)->whereNumber('id')->name('show');
        Route::get('/', \App\Http\Controllers\Website\IndexController::class)->name('index');
        Route::put('/{website}', \App\Http\Controllers\Website\IndexController::class)->name('update');
        Route::post('/', \App\Http\Controllers\Website\StoreController::class)->name('store');
        Route::delete('/{website}', \App\Http\Controllers\Website\IndexController::class)->name('delete');
    });
