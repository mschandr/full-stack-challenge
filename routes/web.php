<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\JobPostingsController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::get('/', [PageController::class, 'home']);
Route::get('/jobs/all', [JobPostingsController::class, 'index'])->name('jobs.index');


