<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;



Route::get('/',     [TaskController::class, 'all']);
Route::get('/{id}', [TaskController::class, 'find']);
Route::post('/',    [TaskController::class, 'create']);
Route::post('/{id}', [TaskController::class, 'update']);
Route::post('/delete/{id}', [TaskController::class, 'delete']);
