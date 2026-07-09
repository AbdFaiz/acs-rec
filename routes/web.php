<?php

use App\Http\Controllers\CandidateApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecruitmentController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/recruitment', [RecruitmentController::class, 'index'])->name('recruitment.index');
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('applications')->name('applications.')->group(function () {
        Route::get('create', [CandidateApplicationController::class, 'create'])->name('create');
        Route::post('/', [CandidateApplicationController::class, 'store'])->name('store');
    });
});

require __DIR__.'/settings.php';
