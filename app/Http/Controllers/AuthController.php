<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Buscar usuario por correo
        $usuario = Usuario::where('correo', $request->email)->first();

        if ($usuario && $usuario->contraseña === $request->password) {
            // Guardar sesión
            session(['usuario_id' => $usuario->id]);
            return redirect('/dashboard'); // o tu ruta principal
        }

        return back()->withErrors([
            'email' => 'Correo o contraseña incorrectos.',
        ]);
    }

    public function logout() {
        session()->flush();
        return redirect('/login');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:usuarios,correo',
            'password' => 'required|min:4',
        ]);

        Usuario::create([
            'correo' => $request->email,
            'contraseña' => $request->password,
        ]);

        return redirect('/login')->with('success', 'Usuario registrado correctamente.');
    }
}