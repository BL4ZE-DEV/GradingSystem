<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\EvaluationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::post('evaluate', [EvaluationController::class , 'Add']);

Route::post('register', [AuthenticationController::class , 'register']);