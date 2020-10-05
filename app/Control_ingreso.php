<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Control_ingreso extends Model
{
    protected $fillable = [
        'name', 'identificacion', 'telefono', 'edad', 'email', 'tipo','direccion',
        'barrio','transporte','tiempo','diabetes','cardio_vascular','pulmonar','obesidad',
        'personas_convive','rango','campo_salud','enfermedad_inmunosupresora','hipertension',
        'enfermedad_pulmonar'
    ];

    public function ingresos() {
        return $this->hasMany('App\Ingreso', 'control_ingreso_id');
    }
}

