<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $fillable = [
        'year', 'nombre', 'profesores_id'
    ];

    public function profesor() {
        return $this->belongsTo('App\Models\Profesor', 'profesores_id');
    }

    public function detalle() {
        return $this->hasMany('App\Models\Detalle_grado', 'grados_id');
    }

    public function materias() {
        return $this->hasMany('App\Models\Materia', 'grados_id');
    }
}
