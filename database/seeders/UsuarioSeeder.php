<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=> "brandon",
            'email'=> Str::random(10).'@gmail.com',
            'password'=> Hash::make('modelo'),
            'sexo'=> 'h',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);


        $user->perfil()->create();

        $user2 = User::create([
            'name'=> Str::random(10),
            'email'=> Str::random(10).'@gmail.com',
            'password'=> Hash::make('vista'),
            'sexo'=> 'm',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);

        $user2->perfil()->create();

    }
}
