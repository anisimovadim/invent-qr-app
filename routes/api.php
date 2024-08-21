<?php

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

Route::get('/inventories', [\App\Http\Controllers\InventoryController::class, 'show']);
Route::post('/create/inventory', [\App\Http\Controllers\InventoryController::class, 'create']);
Route::post('/delete/inventory', [\App\Http\Controllers\InventoryController::class, 'delete']);
Route::get('/inventories/qr', [\App\Http\Controllers\InventoryController::class, 'get_qrs']);
