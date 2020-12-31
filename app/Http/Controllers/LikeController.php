<?php

namespace App\Http\Controllers;

use App\Models\Cinta;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function __construct(){
        
        $this->middleware("auth");
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cinta  $cinta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cinta $cinta)
    {
        return auth()->user()->likesUsuarios()->toggle($cinta);
    }


}
