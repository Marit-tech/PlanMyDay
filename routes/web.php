<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OpdrachtController;
use App\Http\Controllers\AgendaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

Route::get('/opdracht/inplannen', [OpdrachtController::class, 'create'])
    ->middleware(['auth', 'role:klant'])
    ->name('opdracht.create');

Route::post('/opdracht/inplannen', [OpdrachtController::class, 'store'])
    ->middleware(['auth', 'role:klant'])
    ->name('opdracht.store');

Route::get('/opdracht/{opdracht}', [OpdrachtController::class, 'show'])
    ->middleware('auth')
    ->name('opdracht.show');

Route::get('/agenda', [AgendaController::class, 'index'])
    ->middleware('auth')
    ->name('agenda.index');