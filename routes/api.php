<?php

use App\Http\Controllers\ConsolidatedOrderController;
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

Route::get('/consolidated-orders/export', [ConsolidatedOrderController::class, 'export']);
Route::post('/consolidated-orders/import', [ConsolidatedOrderController::class, 'import']);
Route::get('/consolidated-orders', [ConsolidatedOrderController::class, 'index']);
Route::post('/consolidated-orders/refresh', [ConsolidatedOrderController::class, 'refresh']);
Route::get('/download-template', [ConsolidatedOrderController::class, 'downloadImportTemplate']);