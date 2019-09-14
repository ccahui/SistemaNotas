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
}
