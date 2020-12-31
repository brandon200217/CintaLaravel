<?php

namespace App\Http\Controllers;



use App\Models\Cinta;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CintasController extends Controller
{

    public function __construct(){

        $this->middleware("auth", ["except" => "show"]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$cintas = Auth::user()->cintas;

        //$likesUsuario = auth()->user()->likesUsuarios;    

        $usuario = auth()->user();

        $cintas = Cinta::where("user_id",$usuario->id)->paginate(2);

        return view("cintas.index",compact("cintas","usuario"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*Obtener categorias sin modelo
        $categoria = DB::table("categorias")->get()->pluck("nombre","id")->dd();*/



        //Obtener categorias con modelo
        $categoria = Categoria::all(["id","nombre"]);

        return view("cintas.create")->with("categorias",$categoria);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'titulo' => 'required',
            'categoria' => 'required',
            'sinopsis' => 'required',
            'Protagonistas' => 'required',
            'Analisis' => 'required',
            'imagen' => 'required|image',
        ]);


        $ruta_imagen =  $request['imagen']->store("imagenesCintas","public");    
            
        $image = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1200,550);
        $image->save();

        auth()->user()->cintas()->create([
            'Titulo' => $data["titulo"],
            'Protagonistas' => $data["Protagonistas"],
            'Sinopsis' => $data["sinopsis"],
            'Analisis' => $data["Analisis"],
            'imagen' => $ruta_imagen,   
            'categoria_id' => $data["categoria"],
        ]);  

        /*DB::table('cintas')->insert([
            'Titulo' => $data["titulo"],
            'Protagonistas' => $data["Protagonistas"],
            'Sinopsis' => $data["sinopsis"],
            'Analisis' => $data["Analisis"],
            'imagen' => $ruta_imagen,
            'categoria_id' => $data["categoria"],
        ]);*/ 
        
        return redirect()->action("App\Http\Controllers\CintasController@index");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cinta  $cinta
     * @return \Illuminate\Http\Response
     */
    public function show(Cinta $cinta)
    {

        $like = (auth()->user()) ? auth()->user()->likesUsuarios->contains($cinta->id) : false;

        //$cantidadLikes = auth()->user()->likesUsuarios->count();
        $cantidadLikes = $cinta->likesCinta->count();

    
        return view("cintas.show")->with("cinta",$cinta)->with("like",$like)->with("cantidadLikes",$cantidadLikes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cinta  $cinta
     * @return \Illuminate\Http\Response
     */
    public function edit(Cinta $cinta)
    {
        $this->authorize("view",$cinta);
       
        $categoria = Categoria::all(["id","nombre"]);
        
       
        
        return view("cintas.edit")->with("categorias",$categoria)->with("cintas",$cinta);
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

        $this->authorize("update", $cinta);

        $data = $request->validate([
            'titulo' => 'required',
            'categoria' => 'required',
            'sinopsis' => 'required',
            'Protagonistas' => 'required',
            'Analisis' => 'required',
         
        ]);

        $cinta->titulo = $data["titulo"];
        $cinta->categoria_id = $data["categoria"];
        $cinta->sinopsis = $data["sinopsis"];
        $cinta->Protagonistas = $data["Protagonistas"];
        $cinta->Analisis = $data["Analisis"];

        if(request("imagen")){

            $ruta_imagen =  $request['imagen']->store("imagenesCintas","public");    
            $image = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1200,550);
            $image->save();
        
            $cinta->imagen = $ruta_imagen;
        }    


        $cinta->save();

        return redirect()->action([CintasController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cinta  $cinta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cinta $cinta)
    {

        $this->authorize("delete", $cinta);

        
        $cinta->delete();

        return redirect()->action([CintasController::class, "index"]);

    }
}
