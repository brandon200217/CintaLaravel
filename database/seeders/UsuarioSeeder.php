<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> "brandon",
            'email'=> Str::random(10).'@gmail.com',
            'password'=> Hash::make('modelo'),
            'sexo'=> 'h',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name'=> Str::random(10),
            'email'=> Str::random(10).'@gmail.com',
            'password'=> Hash::make('vista'),
            'sexo'=> 'm',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name'=> Str::random(10),
            'email'=> Str::random(10).'@gmail.com',
            'password'=> Hash::make('controlador'),
            'sexo'=> 'h',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);

    }
}
