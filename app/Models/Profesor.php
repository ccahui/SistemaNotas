<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = 'profesores';
    protected $fillable = [
        'nombre', 'apellido','gmail'
    ];
    /** TODO */
    public function cursos(){
        return $this->belongsToMany(Curso::class,'salon_curso_profesor','profesor_id','curso_id')->withPivot('salon_id');;
    }
    /** TODO */
    public function salones(){
        return $this->belongsToMany(Salon::class,'salon_curso_profesor','profesor_id','salon_id')->withPivot('curso_id');
    }

    public static function findByEmail($email){
        return static::where('gmail',$email)->first();
    }

}
