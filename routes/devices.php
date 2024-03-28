<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;

Route::group(['middleware' => 'auth'], function () {

    Route::resource('devices', DeviceController::class /*, [
        'only' => ['index','create','edit','show', 'store', 'update', 'destroy']
    ]*/);
   
});
