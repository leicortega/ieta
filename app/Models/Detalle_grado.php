<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_grado extends Model
{
    protected $fillable = [
        'grados_id', 'estudiantes_id'
    ];

    public function grado() {
        return $this->belongsTo('App\Models\Grado', 'grados_id');
    }

    public function estudiante() {
        return $this->belongsTo('App\Models\Estudiante', 'estudiantes_id');
    }
}
