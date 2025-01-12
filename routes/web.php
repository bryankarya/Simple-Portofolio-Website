<?php
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\PortofolioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExperienceController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Home route
Route::get('/', [PortofolioController::class, 'index'])->name('home');

// Admin routes with authentication middleware
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // About Management Routes
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/about/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::post('/about/update', [AboutController::class, 'update'])->name('about.update');

    // Certification Management Routes
    Route::get('/certification', [CertificationController::class, 'index'])->name('certification.index');
    Route::get('/certification/create', [CertificationController::class, 'create'])->name('certification.create');
    Route::post('/certification/store', [CertificationController::class, 'store'])->name('certification.store');
    Route::get('/certification/edit/{id}', [CertificationController::class, 'edit'])->name('certification.edit');
    Route::post('/certification/update/{id}', [CertificationController::class, 'update'])->name('certification.update');
    Route::delete('/certification/delete/{id}', [CertificationController::class, 'delete'])->name('certification.delete');

    // Experience Management Routes
    Route::get('/experience', [ExperienceController::class, 'index'])->name('experience.index');
    Route::get('/experience/create', [ExperienceController::class, 'create'])->name('experience.create');
    Route::post('/experience/store', [ExperienceController::class, 'store'])->name('experience.store');
    Route::get('/experience/edit/{id}', [ExperienceController::class, 'edit'])->name('experience.edit');
    Route::put('/experience/update/{id}', [ExperienceController::class, 'update'])->name('experience.update');
    Route::delete('/experience/delete/{id}', [ExperienceController::class, 'delete'])->name('experience.delete');
});
