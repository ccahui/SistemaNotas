<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';
    protected $fillable = [
        'nombre', 'grado_id'
    ];
    
    public function grado(){
        // Relacion de 1 --> * (Inverso)
        return $this->belongsTo(Grado::class,'grado_id');
    }
    
    public function salones(){
        return $this->belongsToMany(Salon::class,'salon_curso_profesor','curso_id','salon_id')->withPivot('profesor_id');;
    }
    
    /* TODO */
    public function profesores(){
        return $this->belongsToMany(Profesor::class,'salon_curso_profesor','curso_id','profesor_id')->withPivot('salon_id');;
    }

    
    


}
