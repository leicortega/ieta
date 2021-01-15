<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $fillable = [
        'year', 'nombre', 'profesores_id'
    ];

    public function profesor() {
        return $this->belongsTo('App\Profesor', 'profesores_id');
    }
}
