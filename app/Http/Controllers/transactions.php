<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class transactions extends Controller
{
    public function loans()
    {
        return view('transactions.loans');
    }

    public function qr()
    {
        return view('transactions.qr-payments');
    }

    public function transfer()
    {
        return view('transactions.transfers');
    }
}
