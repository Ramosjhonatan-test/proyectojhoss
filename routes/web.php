<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::view('/', 'landing')->name('landing');

Route::middleware('guest')->group(function () {
	Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
	Route::post('/login', [AuthController::class, 'login'])->name('login.store');
	Route::get('/register', [AuthController::class, 'showRegistration'])->name('register');
	Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

Route::middleware('auth')->group(function () {
	Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
	Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
	Route::get('/dashboard/administrador', [AuthController::class, 'administratorDashboard'])
		->middleware('role:ADMINISTRADOR')->name('dashboard.admin');
	Route::get('/dashboard/cobrador', [AuthController::class, 'collectorDashboard'])
		->middleware('role:COBRADOR')->name('dashboard.collector');
	Route::get('/dashboard/cliente', [AuthController::class, 'clientDashboard'])
		->middleware('role:CLIENTE')->name('dashboard.client');
});
