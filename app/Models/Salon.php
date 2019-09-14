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
}

