<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Nota extends Pivot
{
    public $incrementing = true;
    protected $table = "notas";
/*
    protected $fillable = [
        'notas1', 'notas2','notas3',
    ];
   */ 
    public function alumno() {
        return $this->belongsTo(Alumno::class,'alumno_id');
      }
    
      public function curso() {
          return $this->belongsTo(Curso::class,'curso_id');
      }
}
