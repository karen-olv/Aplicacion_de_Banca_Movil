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

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/security', [AuthController::class, 'security'])->name('security');

Route::get('/home', [home::class, 'home'])->name('home');

Route::get('/layouts/app', [layouts::class, 'app'])->name('app');
Route::get('/layouts/cards', [layouts::class, 'card'])->name('layouts.cards');

Route::get('/support', [support::class, 'support'])->name('support');

Route::get('/transactions/loans', [transactions::class, 'loans'])->name('transactions.loans');
Route::get('/transactions/qr-payments', [transactions::class, 'qr'])->name('transactions.qr');
Route::get('/transactions/transfer', [transactions::class, 'transfer'])->name('transactions.transfer');

Route::get('/users/account', [user::class, 'account'])->name('users.account');
