<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    protected $table = 'salones';
    protected $fillable = [
        'seccion', 'grado_id'
    ];
     
    public function grado(){
        // Relacion de 1 --> * (Inverso)
        return $this->belongsTo(Grado::class,'grado_id');
    }

    public function alumnos(){
        return $this->hasMany(Alumno::class,'salon_id');
    }
    
    public function cursos(){
        return $this->belongsToMany(Curso::class,'salon_curso_profesor')->using(Malla::class)->withPivot('id','profesor_id');
    }

    public function profesores(){
        return $this->belongsToMany(Profesor::class,'salon_curso_profesor','salon_id','profesor_id')->withPivot('curso_id');;
    }
    

    public function getCursos(){
        return $this->grado->cursos;
    }

    public static function malla($salon){
        
        $grado = $salon->grado;
        $cursos = $grado->cursos;
        
        foreach($cursos as $curso){
            $salon->cursos()->attach($curso->id);
        }

        return $salon->cursos;
    }

}

