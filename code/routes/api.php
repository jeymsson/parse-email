<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('GetAll', [EmailController::class, 'index']);
Route::get('GetByID/{email}', [EmailController::class, 'show']);
Route::put('Update/{email}', [EmailController::class, 'update']);
Route::post('Store', [EmailController::class, 'store']);
Route::delete('DeleteByID/{email}', [EmailController::class, 'destroy']);
Route::get('ParseEmail', [EmailController::class, 'parseEmail']);
