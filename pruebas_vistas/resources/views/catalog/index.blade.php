@extends('layouts.master')

@section('title', 'Página Inicial Cliente')

@section('content')
    <div class="row">
    @foreach( $clientes as $cliente )
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">

        <a href="{{ url('/catalog/show/' . $cliente->id ) }}">
            <img src="{{asset('storage/'.$cliente->imagen)}}" style="height:200px"/>
            <h4>
                {{$cliente->nombre}}
            </h4>
        </a>
    </div>
    @endforeach
</div>
@endsection
