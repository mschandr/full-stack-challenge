<?php

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Resources\JobPostingDehydratedResource;
use App\Models\JobPosting;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::get('/jobs', function (Request $request) {
    $query = JobPosting::dehydrated();

    if ($request->location) {
        $query->where('location', 'LIKE', '%' . $request->location . '%');
    }

    if ($request->work_type) {
        $query->where('work_type', $request->work_type);
    }

    if ($request->salary_band) {
        $query->when($request->salary_band === 'low', fn($q) => $q->where('salary', '<', 100000));
        $query->when($request->salary_band === 'mid', fn($q) => $q->whereBetween('salary', [100000, 150000]));
        $query->when($request->salary_band === 'high', fn($q) => $q->where('salary', '>', 150000));
    }

    return Inertia::render('Jobs/Index', [
        'jobs' => JobPostingDehydratedResource::collection(
            $query->paginate(15)->withQueryString()
        ),
        'filters' => $request->only('location', 'work_type', 'salary_band'),
    ]);
})->name('job.index');
