<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginStaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('login_staff');
});

Route::post('/login_staff', [LoginStaffController::class, 'login'])->name('login_staff');

Route::get('/dashboard', [DashboardController::class, 'index'])
     ->name('dashboard');

Route::get('/navigation', function () {
    return view('navigation');
})->name('navigation');

Route::resource('films', FilmController::class);
Route::get('/films', [FilmController::class, 'index'])->name('films.index');
Route::get('/films/{id}', [FilmController::class, 'show'])->name('films.show');
Route::get('/films/{id}/edit', [FilmController::class, 'edit'])->name('films.edit');
Route::put('/films/{id}', [FilmController::class, 'update'])->name('films.update');


Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/staff/dashboard', function () {
    return view('staff.dashboard');
})->name('staff.dashboard');
