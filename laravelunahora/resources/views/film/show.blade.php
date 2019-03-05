@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-6">
            <h4 style="min-height:45px;margin:5px 0 10px 0">
                {{$film->title}}
            </h4>
            <p>
                <b>Género: </b>{{$film->genre}}
            </p>
            <p>
                <b>Fecha de Estreno: </b>{{$film->premiere}}
            </p>
            <p>
                <a class="btn btn-warning" href="{{ url('/films/'.$film->id.'/edit' )}}">Editar</a>
                <button class="btn btn-danger" data-toggle="modal" data-target="#myModal" style="display:inline">
                    Borrar
                </button>
                <a class="btn btn-primary" href="{{ url('/films') }}">Volver</a>
            </p>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog"  id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Borrar a {{$film->title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Seguro que quiere borrar a {{$film->title}} de la BBDD?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('films.destroy', $film->id) }}" method="POST" style="display:inline">
                    {{ method_field('DELETE') }}
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-danger" style="display:inline">
                        Borrar
                    </button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
</div>
@endsection
