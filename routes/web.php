<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrescriptionController;

Route::get('/', function () {
    return redirect(app()->getLocale());
});

Route::prefix('{locale}')
    ->where(['locale' => '[a-zA-Z]{2}'])
    ->middleware('setlocale')
    ->group(function () {

    Route::get('/',function(){return view('dashboard');})->name('dashboard');
    
    Route::get('/documentation',function(){return view('documentation');})->name('documentation');

    Route::get('/download',function(){return view('download');})->name('download');


    

Route::middleware('auth')->group(function() {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/prescription',[PrescriptionController::class, 'store'])->name('prescription.store');
});

require __DIR__.'/auth.php';
require __DIR__.'/api.php';
});

