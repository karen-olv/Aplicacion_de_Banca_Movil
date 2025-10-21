<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class home extends Controller
{
    public function home()
    {
        // Verificamos si hay un usuario logueado
        $usuario = null;

        if (session()->has('usuario_id')) {
            $usuario = Usuario::find(session('usuario_id'));
        }

        // Pasamos los datos a la vista
        return view('home.dashboard', [
            'user' => $usuario,
            'totalBalance' => 12500.50, // Ejemplo
            'income' => 5000.00,        // Ejemplo
            'expenses' => 2500.00,      // Ejemplo
        ]);
    }
}
