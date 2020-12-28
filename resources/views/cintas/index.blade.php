@extends('layouts.app')


@section('botones')

    <a href = "{{ route("cintas.create") }}" class="btn btn-primary mr-2 ">Publica una critica
        <svg class="icon w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path></svg>
    </a>
    
@endsection

@section('content')

    <h2 class="Administrador text-center mb-5">Administrador de Criticas</h2>

    <div class="col-md-10 mx-auto p-3">
        
    
        <table class="table table-primary ">
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
                        <td><strong>{{$cinta->Titulo}}</strong></td>
                        <td><strong>{{$cinta->categoria->nombre}}</strong></td>
                        <td>
                            <div class="section">
                                
                                <form method="POST" action="{{route("cintas.destroy",['cinta' => $cinta->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <input type="submit"  value="Eliminar X" class="btn-eliminar  btn-danger w-80 d-block  mr-1" >
                                    
                                </form>
                                <a href="{{ route("cintas.edit",['cinta' => $cinta->id]) }}" class="btn-editar mr-1">Editar
                                    
                                    <svg class="icon w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></a>
                                <a href="{{ route("cintas.show",['cinta' => $cinta->id]) }}" class="btn-ver mr-1">Ver
                                    <svg class="icon w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg></a>
                            </div>   
                        </td>
                    </tr>
                @endforeach
            </tbody>


        </table>
        
        <div class="col-12 mt-4 justify-content-center d-flex">

            {{$cintas->links()}}
        
        </div>
        
        
    </div>

@endsection

