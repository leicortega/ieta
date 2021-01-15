<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_materia extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'adjunto', 'materias_id'
    ];

    public function materia() {
        return $this->belongsTo('App\Materia', 'materias_id');
    }
}
