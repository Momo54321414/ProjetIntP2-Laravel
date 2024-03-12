<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrescriptionController;

Route::group(['middleware' => 'auth'], function () {

    Route::resource('prescriptions', PrescriptionController::class /*, [
        'only' => ['index','create','edit','show', 'store', 'update', 'destroy']
    ]*/);
   
    
});


