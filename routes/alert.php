<?php

use App\Http\Controllers\AlertController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
 
    Route::resource('alerts', AlertController::class, [
        'only' => ['index','edit', 'update']
    ]);
   
   
});