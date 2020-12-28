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

    //obetener usuarios mediante FK
    //el segundo argumento es para enviarle el fk a laravel 

    public function autor(){
        return $this->belongsTo(User::class,"user_id");
    }

    public function likesCinta(){

        return $this->belongsToMany(User::class,"likes_cintas");

    }

}
