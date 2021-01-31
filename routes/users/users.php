<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::group(['middleware' => ['auth.jwt']], function() {       
	Route::get('/',     [UserController::class, 'all']);
});
Route::get('/{id}', [UserController::class, 'find']);
Route::post('/',    [UserController::class, 'create']);
Route::post('/{id}', [UserController::class, 'update']);
Route::post('/delete/{id}', [UserController::class, 'delete']);
