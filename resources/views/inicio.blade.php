@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

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