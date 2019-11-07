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
        return $this->belongsToMany(Salon::class,'salon_curso_profesor')->using(Malla::class)->withPivot('id','profesor_id');
    }

    public function alumnos(){
        return $this->belongsToMany(Alumno::class,'notas')->using(Nota::class)->withPivot('id','notas1','notas2','notas3');;
    }
    
    /* TODO */
    public function profesores(){
        return $this->belongsToMany(Profesor::class,'salon_curso_profesor','curso_id','profesor_id')->withPivot('salon_id');
    }

    public static function malla($curso){
        
        $grado = $curso->grado;
        $salones = $grado->salones;
        
        foreach($salones as $salon){
            $curso->salones()->attach($salon->id);
        }

        /*TODO */
        $alumnos = $grado->alumnos;
        foreach($alumnos as $alumno){
            $curso->alumnos()->attach($alumno->id);
        }

        return $curso->salones;
    }

    
    
    
    


}
