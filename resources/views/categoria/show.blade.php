@extends('layouts.app')




@section('content')

    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">
            {{$categoriaCinta->nombre}}
        </h2>

        <div class="row">
            @foreach($cintaFiltrada as $cinta)
                @include('ui.vistasPrevias')
            @endforeach
        </div>

        <div class=" d-flex justify-content-center mt-5">
            {{$cintaFiltrada->links()}}
        </div>

    </div>




@endsection