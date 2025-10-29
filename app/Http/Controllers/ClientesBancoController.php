<?php

namespace App\Http\Controllers;

use App\Models\ClientesBanco;
use Illuminate\Http\Request;

class ClientesBancoController extends Controller
{
    public function index()
    {
        $clientes = ClientesBanco::all();
        return view('clientes_banco.index', compact('clientes'));
    }

    // FORM NUEVO CLIENTE (GET /clientes_banco/create)
    public function create()
    {
        return view('clientes_banco.create');
    }

    // GUARDAR CLIENTE (POST /clientes_banco)
    public function store(Request $request)
    {
        // validación básica para no guardar basura
        $request->validate([
            'nombre'         => 'required|string|max:100',
            'apellido'       => 'required|string|max:100',
            'email'          => 'required|email|unique:clientes_banco,email',
            'telefono'       => 'required|string|max:20',
            'numero_cuenta'  => 'required|string|max:50|unique:clientes_banco,numero_cuenta',
            'saldo'          => 'required|numeric'
        ]);

        // crear registro en BD
        ClientesBanco::create([
            'nombre'         => $request->nombre,
            'apellido'       => $request->apellido,
            'email'          => $request->email,
            'telefono'       => $request->telefono,
            'numero_cuenta'  => $request->numero_cuenta,
            'saldo'          => $request->saldo,
        ]);

        // redirigir de vuelta al listado
        return redirect()->route('clientes_banco.index');
    }

    // FORM EDITAR (luego lo hacemos bien)
    public function edit($id)
    {
        return 'form editar cliente ' . $id . ' (pendiente)';
    }

    // ELIMINAR (luego)
    public function destroy($id)
    {
        return 'borrar cliente ' . $id . ' (pendiente)';
    }
}
