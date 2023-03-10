<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

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

Route::get('/file', [FileController::class, 'show'])->name('file');

Route::get('{any?}', function () {
    return view('layouts.app');
})->where('any', '.*');
