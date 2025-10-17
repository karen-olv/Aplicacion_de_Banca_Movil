<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //Se crea el login
    public function login()
    {
        return view('auth.login');
    }
}
