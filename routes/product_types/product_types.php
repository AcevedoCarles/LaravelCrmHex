<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductTypeController;



Route::get('/',     [ProductTypeController::class, 'all']);
Route::get('/{id}', [ProductTypeController::class, 'get']);
Route::post('/',    [ProductTypeController::class, 'create']);
Route::post('/{id}', [ProductTypeController::class, 'update']);
Route::post('/delete/{id}', [ProductTypeController::class, 'delete']);
