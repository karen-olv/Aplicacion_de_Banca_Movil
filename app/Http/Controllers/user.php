<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class user extends Controller
{
    public function account()
    {
        // Datos de ejemplo de cuentas
        $accounts = [
            [
                'type' => 'Cuenta de Ahorro',
                'name' => 'Ahorros Personales',
                'number' => '**** 4582',
                'balance' => 15230.75,
            ],
            [
                'type' => 'Cuenta Corriente',
                'name' => 'Cuenta Principal',
                'number' => '**** 9923',
                'balance' => 8740.00,
            ],
        ];

        // Datos de ejemplo de movimientos
        $transactions = [
            [
                'description' => 'Depósito en efectivo',
                'date' => '2025-10-21',
                'type' => 'credit',
                'amount' => 2000.00,
            ],
            [
                'description' => 'Pago de servicios',
                'date' => '2025-10-20',
                'type' => 'debit',
                'amount' => -450.00,
            ],
            [
                'description' => 'Transferencia recibida',
                'date' => '2025-10-19',
                'type' => 'credit',
                'amount' => 1250.00,
            ],
        ];

        // Enviar los datos a la vista
        return view('users.accounts', [
            'accounts' => $accounts,
            'transactions' => $transactions,
        ]);
    }
}
