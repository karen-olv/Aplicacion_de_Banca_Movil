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
