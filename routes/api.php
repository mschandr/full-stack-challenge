<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\JobPostingController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\RejectionReasonController;

Route::prefix('v1')->group(function () {
    Route::apiResource('/job-postings', JobPostingController::class);

    /**
    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('job-postings', JobPostingController::class)->except(['index', 'show']);
        Route::apiResource('companies', CompanyController::class);
        Route::apiResource('rejection-reasons', RejectionReasonController::class);
        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });

    Route::post('/login', [AuthController::class, 'login']);
     */
});

