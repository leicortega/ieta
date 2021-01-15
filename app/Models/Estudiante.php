<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = [
        'identificacion', 'nombre', 'apellido', 'fecha_nacimiento', 'telefono', 'correo', 'estado'
    ];
}
