<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientesBanco
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string|null $telefono
 * @property string $numero_cuenta
 * @property string $saldo
 * @property string $created_at
 * @property string $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ClientesBanco extends Model
{

    protected $table = 'clientes_banco';


    protected $perPage = 20;

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'numero_cuenta',
        'saldo',
    ];
}
