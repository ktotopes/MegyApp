<?php

use App\Enum\OrderDelivery;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FilteredInfoTheDeceasedController;
use App\Http\Controllers\InfoTheDeceasedController;
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

Route::get('/page', [PageController::class, 'index'])->name('page.index');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::post('/question', [QuestionController::class, 'store'])->name('question.store');
Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');

Route::post('/checkout', [OrderController::class, 'store'])->name('order.store');
Route::get('/available-delivery', function () {
    return response()->json(OrderDelivery::cases(), 200, []);
});

Route::get('/info-the-deceased/{infoTheDeceased}', [InfoTheDeceasedController::class, 'show'])
    ->name('info_the_deceased.show');
Route::get('filter/info-the-deceased', [FilteredInfoTheDeceasedController::class, 'filter'])
    ->name('info_the_deceased.filter');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/update/info-the-deceased', [InfoTheDeceasedController::class, 'update'])
        ->name('info_the_deceased.update');

    Route::delete('/delete/photo/{image}', [InfoTheDeceasedController::class, 'destroyImg'])
        ->name('delete.photo');
    Route::delete('/delete/video/{video}', [InfoTheDeceasedController::class, 'destroyVideo'])
        ->name('delete.video');

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

require __DIR__ . '/auth.php';
