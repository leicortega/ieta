<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $fillable = [
        'fecha', 'estado', 'temperatura', 'contagiados', 'control_ingreso_id', 'sede'
    ];

    public function persona() {
        return $this->belongsTo('App\Control_ingreso');
    }
}

