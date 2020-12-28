<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'sexo',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot(){

        parent::boot();


        static::created(function($user){
            
            $user->perfil()->create();
        });

    }

    //relacion de uno a mucho (un usuario puede tener multiples cintas)

    public function cintas(){

        return $this->hasMany(Cinta::class);
    
    }

     //relacion de uno a uno (un usuario puede tener un perfil)

    public function perfil(){

        return $this->hasOne(Perfil::class);
    
    }

    public function likesUsuarios(){

        return $this->belongsToMany(Cinta::class,"likes_cintas");
    
    }
}
