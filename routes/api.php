<?php

use App\Http\Controllers\Api\TimezoneController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

<<<<<<< HEAD
Route::get('timezone', [TimezoneController::class, 'index']);
=======
Route::get('timezone/{fuseau}', TimezoneController::class )->name("fuseau");
>>>>>>> 531a7dc4d7862febc66c76e81314b6cb037f5dee
