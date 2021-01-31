<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;



Route::get('/',     [CustomerController::class, 'all']);
Route::get('/{id}', [CustomerController::class, 'find']);
Route::post('/',    [CustomerController::class, 'create']);
Route::post('/{id}', [CustomerController::class, 'update']);
Route::post('/delete/{id}', [CustomerController::class, 'delete']);
