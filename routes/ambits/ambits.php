<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmbitController;



Route::get('/',     [AmbitController::class, 'all']);
Route::get('/{id}', [AmbitController::class, 'get']);
Route::post('/',    [AmbitController::class, 'create']);
Route::post('/{id}', [AmbitController::class, 'update']);
Route::post('/delete/{id}', [AmbitController::class, 'delete']);
