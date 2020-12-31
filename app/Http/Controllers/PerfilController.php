<?php

namespace App\Http\Controllers;

use App\Models\Cinta;
use App\Models\Perfil;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __constructor(){
        $this->middleware("auth",['except' => 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {

        $cintas = Cinta::where("user_id",$perfil->id)->paginate(3);

        return view("perfiles.show",compact("perfil","cintas"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        $this->authorize('view',$perfil);

        return view("perfiles.edit",compact("perfil"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {

        $this->authorize('update',$perfil);

        $data = request()->validate([
            'nombre' => 'required',
            'biografia'=>  'required'
        ]);


        if($request["imagen"]){
            
            $ruta_imagen =  $request['imagen']->store("imagenesPerfiles","public");    
            $image = Image::make(public_path("storage/{$ruta_imagen}"))->fit(600,600);
            $image->save();
            $array_imagen = [ "imagen" =>$ruta_imagen];
        }
        
        auth()->user()->name = $data["nombre"];        
        auth()->user()->save();
        unset($data["nombre"]); 
            
        
        auth()->user()->perfil()->update(array_merge(
            
            $data,$array_imagen ?? []
        
        ));



        return redirect()->action([CintasController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
