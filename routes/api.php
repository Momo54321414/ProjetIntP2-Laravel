<?php

use App\Http\Controllers\AlertController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

Route::prefix('{locale}')
    ->where(['locale' => '[a-zA-Z]{2}'])
    ->middleware('setlocale')
    ->group(function () {

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

            Route::get('devices', [DeviceController::class, 'index']);
            Route::post('devices', [DeviceController::class, 'store']);
            Route::delete('devices/{device}', [DeviceController::class, 'destroy']);

            Route::get('calendars', [CalendarController::class, 'index']);

            Route::get('logs', [LogController::class, 'index']);

            Route::patch('updateProfile', [UserController::class, 'updateProfile']);
            Route::patch('updatePassword', [UserController::class, 'updatePassword']);
            Route::patch('updateName', [UserController::class, 'updateName']);
            Route::patch('updateEmail', [UserController::class, 'updateEmail']);
            Route::delete('deleteUser', [UserController::class, 'destroy']);

            Route::get('medications', [MedicationController::class, 'index']);
        });
    });

   

    //Route::get('prescriptions/create', [PrescriptionController::class, 'create'])->name('prescriptions.api.create');
