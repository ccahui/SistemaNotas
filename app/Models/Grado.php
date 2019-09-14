<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table = 'grados';
    protected $fillable = [
        'numero', 'nombre'
    ];

    public function salones(){
        return $this->hasMany(Salon::class,'grado_id');
    }

    public function cursos(){
        return $this->hasMany(Curso::class,'grado_id');
    }
    
    /*hasManyThrough Laravel Documentacion */
    public function alumnos()
    {
        return $this->hasManyThrough(Alumno::class, Salon::class);
    }


}
