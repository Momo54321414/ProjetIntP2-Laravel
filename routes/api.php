<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('login', [UserController::class,'login']);
Route::post('register', [UserController::class, 'register']);
Route::get('alluser', [UserController::class, 'alluser']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', 'UserController@index');
    Route::post('logout', 'UserController@logout');
});