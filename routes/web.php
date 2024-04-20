<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\{
    BasicInfoController,
    EducationController,
    WorkController,
    CertificateController   
};

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');


    Route::resource('basic-info', BasicInfoController::class, [
        'only' => ['create', 'store']
    ]);

    Route::resource('education', EducationController::class, [
        'only' => ['create', 'store']
    ]);

    Route::resource('work', WorkController::class, [
        'only' => ['create', 'store']
    ]);
    
    Route::resource('certificate', CertificateController::class, [
        'only' => ['create', 'store']
    ]);
});
