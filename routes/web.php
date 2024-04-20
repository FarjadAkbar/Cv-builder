<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\{
    BasicInfoController,
    EducationController,
    WorkController,
    CertificateController,
    ObjectiveController,
    PdfController
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
    
    Route::resource('objective', ObjectiveController::class, [
        'only' => ['create', 'store']
    ]);

    Route::resource('education', EducationController::class, [
        'except' => ['show'],
    ]);

    Route::resource('work', WorkController::class, [
        'except' => ['show'],
    ]);
    
    Route::resource('certificate', CertificateController::class, [
        'except' => ['show'],
    ]);

    
    //PDF
    Route::get('pdf-display', [PdfController::class, 'index'])->name('pdf_index');
    Route::get('pdf-download', [PdfController::class, 'download'])->name('download');
});
