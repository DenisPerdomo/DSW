@extends('layouts.master')

@section('content')
    <br>
    <div class="row">
        <div class="col-sm-12 text-center">
            <h2>Listados de nuestros Funkos</h2>
        </div>
    </div>
    <br>
    <div class="row">
        @foreach( $products as $product )
        <div class="col-md-4 text-center">
            <h6>
                {{$product->name}}
            </h6>
            <hr>
            <img class="img-fluid" src="{{asset('storage/'.$product->image)}}"/>
            <p>
                <span class="badge badge-success">Precio: {{$product->price}} €</span>
            </p>
            <p>
                <a class="btn btn-warning" href="{{route('cart-add',$product->id)}}">Lo quiero</a>
                <a class="btn btn-primary" href="{{route('products.show',$product->id)}}">Detalles</a>
            </p>

        </div>
        @endforeach
    </div>
@endsection
