@extends('layouts.app')


@section('content')

    <h1>Cintas de rodaje</h1>

    @foreach($cintas as $key => $cinta)

        <li>{{$cinta}}</li>
    
    @endforeach

    
@endsection