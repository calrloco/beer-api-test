<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BeerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'store'])->name('login');
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'destroy'])->name('logout');
    Route::resource('/beers', BeerController::class)->only('index');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
