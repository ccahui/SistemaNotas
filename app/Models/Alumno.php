<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';
    protected $fillable = [
        'nombre', 'apellido', 'salon_id'
    ];

    public function salon(){
        // Relacion de 1 --> * (Inverso)
        return $this->belongsTo(Salon::class,'salon_id');
    }
}
