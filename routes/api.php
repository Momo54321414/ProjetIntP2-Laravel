<?php

use App\Http\Controllers\PrescriptionController;
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
Route::get('prescriptions', [PrescriptionController::class, 'getAssociatedPrescriptions'])->name('prescriptions.api.index');
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user',  [UserController::class,'index']);
    Route::post('logout',  [UserController::class,'logout']);
   
});

   
    Route::post('prescriptions', [PrescriptionController::class, 'store'])->name('prescriptions.api.store');
    Route::get('prescriptions/{prescription}', [PrescriptionController::class, 'show'])->name('prescriptions.api.show');
    Route::put('prescriptions/{prescription}', [PrescriptionController::class, 'update'])->name('prescriptions.api.update');
    Route::delete('prescriptions/{prescription}', [PrescriptionController::class, 'destroy'])->name('prescriptions.api.destroy');
    Route::get('prescriptions/{prescription}/edit', [PrescriptionController::class, 'edit'])->name('prescriptions.api.edit');
    //Route::get('prescriptions/create', [PrescriptionController::class, 'create'])->name('prescriptions.api.create');

