@extends('layouts.app')


@section('botones')

    
    <a href = "{{ route("cintas.create") }}" class="btn btn-primary mr-2">publica una critica</a>

@endsection

@section('content')

    <h2 class="Administrador text-center mb-5">Administrador de Criticas</h2>

    <div class="col-md-10 mx-auto p-3">
        
    
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Titulo</th>
                    <th scole="col">categoria</th>
                    <th scole="col">Acciones</th>
                </tr>        
                
            </thead>
            <tbody>

                @foreach($cintas as $key => $cinta)
                    <tr>
                        <td>{{$cinta->Titulo}}</td>
                        <td>{{$cinta->categoria->nombre}}</td>
                        <td>
                            <div class="section">

                                <a href="" class="btn-eliminar mr-1">Eliminar</a>
                                <a href="" class="btn-editar mr-1">Editar</a>
                                <a href="" class="btn-ver mr-1">ver</a>
                            </div>   
                        </td>
                    </tr>
                @endforeach
            </tbody>


        </table>
        
    </div>

@endsection