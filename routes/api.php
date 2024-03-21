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
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/question', [\App\Http\Controllers\QuestionController::class, 'store'])->name('question.store');
    Route::get('/reload-captcha', [\App\Http\Controllers\QuestionController::class, 'reloadCaptcha'])->name('reload-captcha');
});

require __DIR__ . '/auth.php';
