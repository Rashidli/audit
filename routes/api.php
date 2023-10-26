<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\WorkerApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Worker;

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

Route::post('/insert_excel',[OrderController::class,'import_excel']);

Route::get('/workers', [WorkerApiController::class, 'index']);
Route::get('/worker/{id}',[WorkerApiController::class,'show']);
