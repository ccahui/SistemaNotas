<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = 'profesores';
    protected $fillable = [
        'nombre', 'apellido','especialidad'
    ];

    public function cursos(){
        return $this->belongsToMany(Curso::class,'salon_curso_profesor','profesor_id','curso_id')->withPivot('salon_id');;
    }

    public function salones(){
        return $this->belongsToMany(Salon::class,'salon_curso_profesor','profesor_id','salon_id')->withPivot('curso_id');
    }

}
