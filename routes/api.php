<?php

use App\Http\Controllers\PersonController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('people')->group(function () {
    Route::post('/', [PersonController::class, 'store'])->name('person.store');
    Route::get('/', [PersonController::class, 'index'])->name('person.get');
    Route::patch('/{person}', [PersonController::class, 'update'])->name('person.update');
    Route::delete('/{person}', [PersonController::class, 'delete'])->name('person.delete');
});
