<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';

    protected $fillable = [
        'identificacion', 'name', 'sede', 'cargo', 'estado', 'email', 'pin', 'qr', 'foto',
    ];
}