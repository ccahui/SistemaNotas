<?php

namespace App\Models;

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
}
