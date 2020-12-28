@extends('layouts.app')

@section('estilos')
@endsection
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" />


@section('botones')
    
    <a href = "{{ route("cintas.index") }}" class="btn btn-primary mr-2">Volver</a>
@endsection



@section('content')
    
    <h1 class="text-center">Editar mi perfil</h1>

    <div class="row justify-content-center mt-5">
        <div class="col-md-10 bg-white p-3">

            <form 
                action="{{route('perfiles.update', ['perfil'=> $perfil->id ])}}"
                method="POST"
                enctype="multipart/form-data"
            >
                @method('put')
                @csrf

                <div class="form-group">
                    
                    <label for="nombre">Nombre</label>
                    
                    <input type="text"
                        name="nombre"
                        class="form-control @error('nombre') is-invalid @enderror"
                        id="nombre"
                        placeholder="nombre"
                        value="{{$perfil->user->name}}"
                    
                    >    

                    @error('nombre')
                        <span class="invalid-feedback  d-block" role="alert"> 
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                    
                </div>


                <div class="form-group mt-3">
                    
                    <label for="biografia">biografia</label>
                    <input type="hidden" 
                        id="biografia" 
                        name="biografia" 
                        value="{{$perfil->biografia}}"
                    
                    >

                    <trix-editor input="biografia" class="trix-content form-control @error('biografia') is-invalid @enderror"></trix-editor>
                    
                    @error('biografia')
                        <span class="invalid-feedback  d-block" role="alert"> 
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="imagen">Tu Imagen</label>
                    
                    <input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror id='imagen'">

                    @if($perfil->imagen)
                             
                        <div class=" mt-4">
                            <p>Imagen Actual:</p>
                            <img src="/storage/{{$perfil->imagen}}" style="width:300px">
                        </div>
                        
                        @error('imagen')
                            <span class="invalid-feedback  d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    @endif    
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
