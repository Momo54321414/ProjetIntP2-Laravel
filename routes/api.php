<?php

use App\Http\Controllers\AlertController;
use App\Http\Controllers\PrescriptionController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);


Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('logout',  [UserController::class, 'logout']);

    Route::get('prescriptions', [PrescriptionController::class, 'index']);
    Route::post('prescriptions', [PrescriptionController::class, 'store']);
    Route::get('prescriptions/{prescription}', [PrescriptionController::class, 'show']);
    Route::patch('prescriptions/{prescription}', [PrescriptionController::class, 'update']);
    Route::delete('prescriptions/{prescription}', [PrescriptionController::class, 'destroy']);

    Route::get('alerts', [AlertController::class, 'index']);
    Route::patch('alerts/{alert}', [AlertController::class, 'update']);

});


   

    //Route::get('prescriptions/create', [PrescriptionController::class, 'create'])->name('prescriptions.api.create');
