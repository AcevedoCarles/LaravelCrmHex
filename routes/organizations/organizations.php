<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;


Route::group(['middleware' => ['auth.jwt']], function() { 
	Route::get('/',     [OrganizationController::class, 'all']);
	Route::get('/mine', [OrganizationController::class, 'mine']);
	Route::get('/find/{id}', [OrganizationController::class, 'findByUser']);
	Route::get('/{id}', [OrganizationController::class, 'get']);
	Route::post('/',    [OrganizationController::class, 'create']);
	Route::post('/{id}', [OrganizationController::class, 'update']);
	Route::post('/delete/{id}', [OrganizationController::class, 'delete']);
});
