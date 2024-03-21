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
    Route::group(['prefix' => 'home-page'],function (){
        Route::get('/main', [\App\Http\Controllers\HomePageController::class, 'main'])->name('main');
        Route::get('/contact', [\App\Http\Controllers\HomePageController::class, 'contact'])->name('contact');
        Route::get('/partner', [\App\Http\Controllers\HomePageController::class, 'partner'])->name('partner');
        Route::get('/popularQuestion', [\App\Http\Controllers\HomePageController::class, 'popularQuestion'])->name('popularQuestion');
        Route::get('/ceo', [\App\Http\Controllers\HomePageController::class, 'ceo'])->name('ceo');
    });
});

require __DIR__ . '/auth.php';
