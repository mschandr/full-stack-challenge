<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\JobPostingController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\RejectionReasonController;

Route::prefix('v1')->group(function () {
    // Public routes
    Route::get('/job-postings', [JobPostingController::class, 'index']);
    Route::get('/job-postings/all', [JobPostingController::class, 'all']);
    Route::get('/job-postings/{id}', [JobPostingController::class, 'show']);
    Route::post('/login', [AuthController::class, 'login']);

    // Authenticated routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/job-postings', [JobPostingController::class, 'store']);
        Route::put('/job-postings/{id}', [JobPostingController::class, 'update']);
        Route::delete('/job-postings/{id}', [JobPostingController::class, 'destroy']);

        Route::apiResource('companies', CompanyController::class);
        Route::apiResource('rejection-reasons', RejectionReasonController::class);

        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});
