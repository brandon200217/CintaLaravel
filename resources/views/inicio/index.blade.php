@extends('layouts.app')


@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
@endsection

@section('content')

    <div class="container nuevas-cintas">
        <h2 class="titulo-categoria text-uppercase mb-5 mt-5">Ultimas Publicaciones</h2>
        
        <div class="owl-carousel owl-theme">
            @foreach($ultimasPublicaciones as $ultimaPublicacion)
               
                    <div class="card mb-3"> 
                        <a href="{{route('cintas.show', ['cinta' =>$ultimaPublicacion->id])}}"> 
                            <img src="/storage/{{$ultimaPublicacion->imagen}}" class="card-img-top" alt="imagen-cinta">
                        </a>
                        <div class="card-body">
                            <!-- WORDS PALABRAS QUE MOSTRAR - LIMIT PALABRAS QUE RECORTAR -->
                            <h4 class="text-center">{{Str::title($ultimaPublicacion->Titulo)}}</h4>
                            
                            <p> {{Str::limit( strip_tags($ultimaPublicacion->Analisis),108)}}</p>

                            <a href="{{route('cintas.show', ['cinta' =>$ultimaPublicacion->id])}}" class="btn btn-primary d-block  font-weight-bold text-uppercase">Ver Critica</a>
                        </div>  
                    </div>

            @endforeach
            
        </div>
       
    
    </div>


    <div class="container">
        <h2 class="titulo-categoria text-uppercase mb-3 mt-5">Mas votados</h2>
        <div class="row">   
            @foreach($masVotados as $cinta)
                 
                @include('ui.vistasPrevias')                        

            @endforeach            
        </div>
    </div>

    @foreach($cintas as $key => $tipoCinta)
        <div class="container">
            <h2 class="titulo-categoria text-uppercase mb-3 mt-5">{{str_replace("-"," " , $key )}}</h2>
            <div class="row">
                
                @foreach($tipoCinta as $cintas)
                    
                    @foreach($cintas as $cinta)
                     
                        @include('ui.vistasPrevias')                        

                    @endforeach            
                @endforeach
            </div>
        </div>
    @endforeach

@endsection


@section('footer')
    
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase">¿ Sabes como Publicar ?</h5>
          <p>
            Tienes que ir al panel de control en donde podras encontrar una tabla donde estararn
            todas tus publicaciones, de no haber ninguna la tabla estara vacia por lo que sera el momento de
            ingresar en el boton de publicar critica para poder hacer tu primera publicacion y que los demas puedan verla.
            <a href="{{route("cintas.index")}}">Panel de Control</a>
          </p>
        </div>

        
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase">Hola {{Auth::user()->name}}</h5>
            <p>
              Cintas Mundo es una web desarrollada para que todas las personas puedan crearse 
              una cuenta y poder tener la posibilidad de publicar o leer criticas sobre sus 
              series,peliculas,animes y demas programas favoritos. Serte y disfruta.
            </p>
        </div>
    </div>

    </div>

    <div class="text-center p-3" style="background-color: rgb(90, 124, 197)">
       
        <a href="https://www.facebook.com/brandon.roahernandez/">
            <img src="https://img.icons8.com/color/48/000000/facebook.png"/>
        </a>
        
        <a href="https://www.instagram.com/brandondanielroa/?hl=es-la">
            <img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/>
        </a>

        <a href="https://icons8.com/icon/Xy10Jcu1L2Su/instagram"><strong>Icons</strong></a>
        <a href="https://icons8.com/icon/13912/facebook">.</a>
        
        
        
    </div>
    <!-- Copyright -->  
@endsection
