<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('show-login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register-store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// middleware group function tapi tiap routenya diawali employee/
Route::middleware(['auth'])->prefix('employee')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'employee'])->name('dashboard');

    Route::get('/main-profile', [ProfileController::class, 'showProfile'])->name('main-profile');
    Route::post('/main-profile', [ProfileController::class, 'updateProfile'])->name('employee.profile.update');
    Route::post('/main-profile/update/password', [ProfileController::class, 'changePassword'])->name('change-password');

    Route::get('/education', [EducationController::class, 'showEducation'])->name('education');
    Route::post('/education', [EducationController::class, 'saveEducation'])->name('education-save');
    Route::get('/education/delete/{id}', [EducationController::class, 'deleteEducation'])->name('education-delete');
    Route::get('education/download/csv', [EducationController::class, 'downloadCSV'])->name('download-csv');
    Route::get('education/download/pdf', [EducationController::class, 'downloadPdf'])->name('download-pdf');
});