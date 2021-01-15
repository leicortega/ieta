<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = [
        'nombre', 'year', 'grados_id', 'profesores_id'
    ];

    public function grado() {
        return $this->belongsTo('App\Grado', 'grados_id');
    }

    public function profesor() {
        return $this->belongsTo('App\Profesor', 'profesores_id');
    }
}
