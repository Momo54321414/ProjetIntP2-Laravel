<?php

use App\Http\Controllers\PrescriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

    //Inserer les routes ici après avoir utilisé le token pour s'authentifier
});


    Route::get('prescriptions', [PrescriptionController::class, 'index'])->name('prescriptions.api.index');
    Route::post('prescriptions', [PrescriptionController::class, 'store'])->name('prescriptions.api.store');
    Route::get('prescriptions/{prescription}', [PrescriptionController::class, 'show'])->name('prescriptions.api.show');
    Route::put('prescriptions/{prescription}', [PrescriptionController::class, 'update'])->name('prescriptions.api.update');
    Route::delete('prescriptions/{prescription}', [PrescriptionController::class, 'destroy'])->name('prescriptions.api.destroy');
    Route::get('prescriptions/{prescription}/edit', [PrescriptionController::class, 'edit'])->name('prescriptions.api.edit');
    //Route::get('prescriptions/create', [PrescriptionController::class, 'create'])->name('prescriptions.api.create');

  
