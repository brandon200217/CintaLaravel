<?php

namespace App\Http\Controllers;

use App\Models\Cinta;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function show(Categoria $categoriaCinta){

        $cintaFiltrada = Cinta::where('categoria_id' , $categoriaCinta->id)->paginate(2);
   
        return view('categoria.show',compact("cintaFiltrada","categoriaCinta"));

    }   
}
