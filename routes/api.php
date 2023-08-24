<?php

use App\Http\Controllers\RecordController;
use App\Http\Middleware\EnvironmentCheckMiddleware;
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

Route::middleware([EnvironmentCheckMiddleware::class])->group(function () {
    Route::get('/registros',                [RecordController::class, 'record']);
    Route::post('/registros',               [RecordController::class, 'store']);
    Route::get('/registros/{record}',       [RecordController::class, 'show']);
    Route::put('/registros/{record}',       [RecordController::class, 'update']);
    Route::patch('/registros/{record}',     [RecordController::class, 'update']);
    Route::delete('/registros/{record}',    [RecordController::class, 'destroy']);
});
