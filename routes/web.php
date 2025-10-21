<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\home;
use App\Http\Controllers\layouts;
use App\Http\Controllers\support;
use App\Http\Controllers\transactions;
use App\Http\Controllers\user;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/security', [AuthController::class, 'security'])->name('security');

Route::get('/home', [home::class, 'home'])->name('home');

Route::get('/layouts/app', [layouts::class, 'app'])->name('app');
Route::get('/layouts/cards', [layouts::class, 'card'])->name('layouts.cards');

Route::get('/support', [support::class, 'support'])->name('support');

Route::get('/transactions/loans', [transactions::class, 'loans'])->name('transactions.loans');
Route::get('/transactions/qr-payments', [transactions::class, 'qr'])->name('transactions.qr');
Route::get('/transactions/transfer', [transactions::class, 'transfer'])->name('transactions.transfer');

Route::get('/users/account', [user::class, 'account'])->name('users.account');

Route::get('/accounts', [user::class, 'account'])->name('accounts');

Route::get('/transfers', [user::class, 'transfer'])->name('transfers');



Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [home::class, 'home'])->name('dashboard');
