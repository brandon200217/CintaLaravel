@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            
            <div class="col-md-5">
                
                @if($perfil->imagen)
                    
                    <img src="/storage/{{$perfil->imagen}}" class="w-100 rounded-circle" alt="imagenUser">
                
                @endif
            
            </div>
          
            <div class="col-md-7 mt-5  mt-md-0">
                
                <h2 class=" text-center mb-2 text-primary">{{$perfil->user->name}}</h2>
                <div class="biografia">
                    {!! $perfil->biografia !!}
                </div>
            </div>
        </div>

        <h2 class="text-center my-5">Criticas Creadas por {{$perfil->user->name}}</h2>

        <div class="container">

            <div class="row mx-auto bg-black p-4">

                @if($cintas->count() > 0)
                    
                   @foreach($cintas as $cinta)
                       
                        <div class=" col-md-4 mb-4">

                            <div class="card">
                                <img src="/storage/{{$cinta->imagen}}" class="card-img-top" alt="imagen cintas">
                                
                                <div class="card-body">
                                    <h3 class=" text-center">{{$cinta->Titulo}}</h3>
                                    <a href="{{route('cintas.show',['cinta' => $cinta->id ])}}" class="btn btn-primary d-block mt-4 text-uppercase font-weight-bold">Ver receta</a>
                                </div>
                                
                            </div>

                        </div>

                   @endforeach
                @else{
                    <p class="text-center w-100"> No hay publicaciones aun ...</p>
                }
                @endif


            </div>
            @if($cintas->count() <= 2)

                <div>
                    {{$cintas->links()}}
                </div>
            
                @else{
                    <div class="col-12 mt-4 justify-content-center d-flex">
                        {{$cintas->links()}}
                    </div>
                }
            
            @endif

        </div>

    </div>

@endsection

