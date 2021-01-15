<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_grados extends Model
{
    protected $fillable = [
        'grados_id', 'estudiantes_id'
    ];

    public function grado() {
        return $this->belongsTo('App\Grado', 'grados_id');
    }

    public function estudiante() {
        return $this->belongsTo('App\Estudiante', 'estudiantes_id');
    }
}
