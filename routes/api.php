<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\DebitController;
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

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::post('home', 'home');
});

Route::controller(DebitController::class)->group(function () {
    Route::post('/debit', 'debit')->middleware('jwt.auth');
});

Route::controller(CreditController::class)->group(function () {
    Route::post('/credit', 'credit')->middleware('jwt.auth');
});

Route::controller(BalanceController::class)->group(function () {
   Route::get('/balance', 'getBalanceByUser')->middleware('jwt.auth');
   Route::get('/balance/json', 'getTotalBalance')->middleware('jwt.auth');
   Route::get('/historic', 'historic')->middleware('jwt.auth');
});
