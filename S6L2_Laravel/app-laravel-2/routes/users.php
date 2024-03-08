<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

    // Route::Method('URI', callback | controller)
    /*
        Route::get('/users', function () {
        return view('users');
        });
    */

    /*
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users/create', [UserController::class, 'create']);
        Route::post('/users', [UserController::class, 'store']);
        Route::get('/users/{id}', [UserController::class, 'show']);
        Route::get('/users/{id}/edit', [UserController::class, 'edit']);
        Route::put('/users/{id}', [UserController::class, 'update']);
        Route::patch('/users/{id}', [UserController::class, 'update']);
        Route::delete('/users/{id}', [UserController::class, 'destroy']);
    */

    Route::resource('/users', UserController::class);



