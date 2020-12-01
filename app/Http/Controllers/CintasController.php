<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CintasController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $cintas = ["peliculas","series","programas","anime"];

        return view("cintas.index")->with("cintas",$cintas);
    }
}
