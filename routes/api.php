<?php

use App\Enum\OrderDelivery;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DeceasedController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\QuestionController;
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

//$t = \App\Models\User::where('email', 'user@gmail.com')->first()->createToken('api');
//dd($t->plainTextToken);

Route::get('/page', [PageController::class, 'index'])->name('page.index');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::post('/question', [QuestionController::class, 'store'])->name('question.store');
Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');

Route::post('/checkout', [OrderController::class, 'store'])->name('order.store');
Route::get('/available-delivery', function () {
    return response()->json(OrderDelivery::cases());
});

Route::get('/deceased', [DeceasedController::class, 'index'])->name('deceased.index');
Route::get('/deceased/{deceased}', [DeceasedController::class, 'show'])->name('deceased.show');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::group(['prefix' => 'deceased-update', 'as' => 'deceased-update.'], function () {
        Route::post('/', [DeceasedController::class, 'update'])->name('info');

        Route::delete(
            '/blocks/{block}/images/{image}/remove',
            [DeceasedController::class, 'imageDelete'],
        )->name('image-delete');
        Route::delete(
            '/blocks/{block}/videos/{video}/remove',
            [DeceasedController::class, 'videoDelete'],
        )->name('video-delete');
    });

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

require __DIR__ . '/auth.php';
