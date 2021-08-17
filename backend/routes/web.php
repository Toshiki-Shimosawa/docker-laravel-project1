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
    Route::get('/', [AdminTopController::class, 'index']);
    Route::post('/new', [AdminTopController::class, 'postNew']);
    Route::post('/edit', [AdminTopController::class, 'postEdit']);
});
