<?php


use App\Http\Controllers\PrescriptionController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});*/

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::get('alluser', [UserController::class, 'alluser']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('user',  [UserController::class, 'index']);
    Route::post('logout',  [UserController::class, 'logout']);

    Route::get('prescriptions', [PrescriptionController::class, 'getAssociatedPrescriptions']);
    Route::post('prescriptions', [PrescriptionController::class, 'store']);
    Route::get('prescriptions/{prescription}', [PrescriptionController::class, 'show']);
    Route::put('prescriptions/{prescription}', [PrescriptionController::class, 'update']);
    Route::delete('prescriptions/{prescription}', [PrescriptionController::class, 'destroy']);
    Route::get('prescriptions/{prescription}/edit', [PrescriptionController::class, 'edit']);
});

   

    //Route::get('prescriptions/create', [PrescriptionController::class, 'create'])->name('prescriptions.api.create');
