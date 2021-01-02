<?php

namespace App\Http\Controllers;

use App\Models\Cinta;
use App\Models\Categoria;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        // Obtener criticas nuevas
        //$masVotados = Cinta::has("likes",">",2)->get();
        $masVotados = Cinta::withCount('likesCinta')->orderBy("likes_cinta_count","desc")->take(3)->get();


        $categorias = Categoria::all();
        
        //Cintas por categoria
        $cintas=[];

        foreach ($categorias as  $categoria) {
            $cintas[Str::slug($categoria->nombre)][] = Cinta::where("categoria_id",$categoria->id)->orderBy("categoria_id","desc")->get();
        }

      
        //$ultimasPublicaciones = Cinta::orderBy("created_at","ASC")->limit(6)->get();
        //oldest los mas viejos
        $ultimasPublicaciones = Cinta::latest()->limit(6)->get();
        return view('inicio.index',compact("ultimasPublicaciones",'cintas','masVotados'));
    }
}
