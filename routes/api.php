<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/checkout', [\App\Http\Controllers\OrderController::class, 'store'])->name('order.store');

    Route::post('/question', [\App\Http\Controllers\QuestionController::class, 'store'])->name('question.store');

    Route::post('/update/infoTheDeceased', [\App\Http\Controllers\InfoTheDeceasedController::class, 'update'])
        ->name('infoTheDeceased.update');

    Route::get('/delete/photo/{id}', [\App\Http\Controllers\InfoTheDeceasedController::class, 'destroyImg'])
        ->name('img-destroy');
    Route::get('/delete/video/{id}', [\App\Http\Controllers\InfoTheDeceasedController::class, 'destroyVideo'])
        ->name('video-destroy');

    Route::get('/page', [\App\Http\Controllers\PageController::class, 'index'])->name('page.index');

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

require __DIR__ . '/auth.php';
