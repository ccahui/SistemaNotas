<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Alumno extends Authenticatable
{
    protected $guard = 'alumno';
    protected $table = 'alumnos';
    protected $fillable = [
        'nombre', 'apellido', 'salon_id','gmail','pasword'
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
    
    public static function findByEmail($email){
        return static::where('gmail',$email)->first();
    }

    public static function matricular($alumno){
        $grado = $alumno->getGrado();
        $cursos = $grado->cursos;
        
        foreach($cursos as $curso){
            $alumno->cursos()->attach($curso->id);
        }

        return $alumno->cursos;
    }

}