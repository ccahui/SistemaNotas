<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Malla extends Model
{
    public $incrementing = true;
    protected $table = "salon_curso_profesor";

    public function curso() {
        return $this->belongsTo(Curso::class,'curso_id');
      }
    
      public function salon() {
          return $this->belongsTo(Salon::class,'salon_id');
      }
}
