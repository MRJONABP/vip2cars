<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'placa',
        'marca',
        'modelo',
        'anio_fabricacion',
        'cliente_nombre',
        'cliente_apellidos',
        'cliente_documento',
        'cliente_correo',
        'cliente_telefono'
    ];
}