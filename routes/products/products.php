<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;



Route::get('/',     [ProductController::class, 'all']);
Route::get('/{id}', [ProductController::class, 'get']);
Route::post('/',    [ProductController::class, 'create']);
Route::post('/{id}', [ProductController::class, 'update']);
Route::post('/delete/{id}', [ProductController::class, 'delete']);
