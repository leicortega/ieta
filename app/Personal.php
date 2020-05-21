<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Personal extends Model
{
    protected $table = 'personal';

    protected $fillable = [
        'identificacion', 'name', 'sede', 'cargo', 'estado', 'email', 'rh', 'pin', 'qr', 'foto',
    ];

    public static function setFoto($foto) {
        if ($foto) {
            $imageName = Str::random(20).'.jpg';
            $imagen = Image::make($foto)->encode('jpg', 75);
            $imagen->resize(200, 200, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('public')->put('imagenes/personal/'.$imageName, $imagen->stream());
            return $imageName;
        } else {
            return false;
        }
        
    }
}   