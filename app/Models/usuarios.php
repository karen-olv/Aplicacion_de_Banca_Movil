<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    protected $table = 'usuarios'; // tu tabla personalizada

    protected $fillable = ['correo', 'contraseña'];

    public $timestamps = false; // si tu tabla no tiene created_at / updated_at
}