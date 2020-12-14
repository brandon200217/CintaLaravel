@extends('layouts.app')


@section('content')



    <article class="contenido-cintas">

        <h1 class=" text-center mb-4">{{strtoupper($cinta->Titulo)}}</h1>

        <div class="image-cintas">

            <img src="/storage/{{$cinta->imagen}}" class="  w-100">

        </div>


        <div class="cintas-meta mt-2">
                
            <p>
                <span class=" font-weight-bold text-primary">Genero:</span>
                {{$cinta->categoria->nombre}}
            </p>
                
            <p>
                <span class=" font-weight-bold text-primary">Autor:</span>
                {{$cinta->user_id}}
            </p>

            <p>
                <span class=" font-weight-bold text-primary">Fecha de publicacion:</span>

                @php
                    $fechaPublicacion = $cinta->created_at ;
                @endphp
                

                <fecha-publicacion id ="componente" data = {{$fechaPublicacion}}></fecha-publicacion>
                               
            </p>
            
           

        </div>

        <div class="sinopsis">
            <h3 class="my-3 text-primary">Sinopsis</h3>
        
            {!! $cinta->Sinopsis !!}
        </div>

        <div class="analisis">
            <h3 class="my-3 text-primary">Analisis</h3>
        
            {!! $cinta->Analisis !!}
        </div>

        <div class="protagonistas">
            <h3 class="my-3 text-primary">Protagonistas:</h3>
         
               {!!$cinta->Protagonistas!!}
        
        </div>
  
    </article>

@endsection