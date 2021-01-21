<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_materia extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'adjunto', 'entregado', 'fecha_entrega', 'adjunto_entregado', 'calificacion', 'materias_id', 'estudiantes_id'
    ];

    public function materia() {
        return $this->belongsTo('App\Models\Materia', 'materias_id');
    }

    public function estudiante() {
        return $this->belongsTo('App\Models\Estudiante', 'estudiantes_id');
    }
}
