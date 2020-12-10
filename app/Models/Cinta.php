<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinta extends Model
{
    use HasFactory;

    protected $fillable = [
        'Titulo',
        'Protagonistas',
        'Sinopsis',
        'Analisis',
        'imagen',
        'categoria_id',
    ];


    public function categoria(){
        
        return $this->belongsTo(Categoria::class);
    }

}
