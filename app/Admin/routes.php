<?php

use App\Admin\Controllers\ContactController;
use App\Admin\Controllers\PartnerController;
use App\Admin\Controllers\UserController;
use App\Admin\Controllers\PageController;
use App\Admin\Controllers\QuestionController;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('users', UserController::class);
    $router->resource('pages', PageController::class);
    $router->resource('questions', QuestionController::class);
    $router->resource('contacts', ContactController::class);
    $router->resource('partners', PartnerController::class);

});
