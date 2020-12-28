@extends('layouts.app')

@section('estilos')
@endsection
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" />
@section('botones')

    
    <a href = "{{ route("cintas.index") }}" class="btn btn-primary mr-2">
        <svg class="icon w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>
        Volver
    </a>

@endsection

@section('content')

    <h2 class="Administrador text-center mb-5">Editar Critica de {{$cintas->Titulo}}</h2>

    <div class="row justify-content-center mt-5">
        
        <div class="col-md-8">

            <form method="POST" action="{{route('cintas.update', ['cinta' => $cintas->id ])}}" enctype="multipart/form-data" novalidate>
                @csrf

                @method('PUT')
                <div class="form-group">
                    
                    <label for="titulo">Titulo de critica</label>
                    
                    <input type="text"
                        name="titulo"
                        class="form-control @error('titulo') is-invalid @enderror"
                        id="titulo"
                        placeholder="Titulo de critica"
                        value="{{$cintas->Titulo}}">
                        
                    </>    

                    @error('titulo')
                        <span class="invalid-feedback  d-block" role="alert"> 
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                    
                </div>



                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" 
                        class="form-control @error('categoria') is-invalid @enderror" 
                        id="categoria"
                        value={{old('categoria')}}>>
                        
                        <option value ="">Escoja una Categoria</option>
                        
                        @foreach($categorias as  $categoria)

                            <option 
                                value="{{$categoria->id}}"
                                {{$cintas->categoria_id == $categoria->id ? "selected" : ""}}>
                                {{$categoria->nombre}}
                            </option> 
                        @endforeach
                           
                    </select>   

                    @error('categoria')
                        <span class="invalid-feedback  d-block" role="alert"> 
                            <strong>{{$message}}</strong>
                        </span>
                     @enderror

                </div>

                <div class="form-group mt-3">
                    
                    <label for="sinopsis">Sinopsis</label>
                    <input type="hidden" 
                        id="sinopsis" 
                        name="sinopsis" 
                        value="{{$cintas->Sinopsis}}">

                    <trix-editor input="sinopsis" class="trix-content form-control @error('sinopsis') is-invalid @enderror"></trix-editor>
                    
                    @error('sinopsis')
                        <span class="invalid-feedback  d-block" role="alert"> 
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group mt-3">
                    
                    <label for="Protagonistas">Protagonistas</label>
                    <input type="hidden" 
                        id="Protagonistas" 
                        name="Protagonistas" 
                        value="{{$cintas->Protagonistas}}">

                    <trix-editor input="Protagonistas" class="trix-content form-control @error('Protagonistas') is-invalid @enderror"></trix-editor>
                    
                    @error('Protagonistas')
                        <span class="invalid-feedback  d-block" role="alert"> 
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    
                    <label for="Analisis">Analisis</label>
                    <input type="hidden" 
                        id="Analisis" 
                        name="Analisis" 
                        value="{{$cintas->Analisis}}">

                    <trix-editor input="Analisis" class="trix-content form-control @error('Analisis') is-invalid @enderror"></trix-editor>
                    
                    @error('Analisis')
                        <span class="invalid-feedback  d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="imagen">Elige una Imagen</label>
                    
                    <input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror id='imagen'">

                    <div class=" mt-4">
                        <p>Imagen Actual:</p>
                        <img src="/storage/{{$cintas->imagen}}" style="width:300px">
                    </div>
                    
                    @error('imagen')
                        <span class="invalid-feedback  d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                        
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Actualizar Critica">        
                </div>
            </form>

        </div>
    </div>

@endsection



@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" defer></script>
@endsection

