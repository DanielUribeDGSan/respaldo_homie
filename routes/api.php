<?php

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

Route::get('/send-recordatorio-transaction-24h', [App\Http\Controllers\ApiController::class, 'sendRT24h'])->name('sendRT24h');

Route::get('/send-transaction', [App\Http\Controllers\ApiController::class, 'send_transaction'])->name('send_transaction');
Route::get('/cambiar-estatus', [App\Http\Controllers\ApiController::class, 'StautsChnage'])->name('StautsChnage');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
