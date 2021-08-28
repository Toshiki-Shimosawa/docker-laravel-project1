<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TopController;
use App\Http\Controllers\Admin\TopController as AdminTopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [TopController::class, 'index']);

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'contents'], function () {
        Route::get('/', [AdminTopController::class, 'contents']);
        Route::post('/new', [AdminTopController::class, 'contetnsPostNew']);
        Route::post('/edit', [AdminTopController::class, 'contetnsPostEdit']);
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [AdminTopController::class, 'user']);
        Route::post('/new', [AdminTopController::class, 'userPostNew']);
        Route::post('/delete', [AdminTopController::class, 'userPostDelete']);
        Route::post('/edit', [AdminTopController::class, 'userPostEdit']);
    });
});
