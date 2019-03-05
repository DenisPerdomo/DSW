@extends('layouts.master')

@section('content')
    <div class="row">
    @foreach( $films as $film )
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">
        <a href="{{ url('/films/' . $film->id ) }}">
            <h4>
                {{$film->title}}
            </h4>
        </a>
    </div>
    @endforeach
</div>
@endsection
