<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';
    protected $fillable = [
        'nombre', 'apellido', 'salon_id','gmail'
    ];

    public function salon(){
        // Relacion de 1 --> * (Inverso)
        return $this->belongsTo(Salon::class,'salon_id');
    }

    public function getGrado(){
        return $this->salon->grado;
    }

    public function cursos(){
        return $this->belongsToMany(Curso::class,'notas')->using(Nota::class)->withPivot('id','notas1','notas2','notas3');
    }
    


}
