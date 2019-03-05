@extends('layouts.master')

@section('title', 'Página Editar Cliente')

@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                 <div class="card-header text-center">
                    Modificar Pelicula
                 </div>
                 <div class="card-body">
                    <form action="{{ route('films.update', $film->id) }}" method="post">
                        {{ csrf_field()}}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                           <label for="filmTitleId">Título</label>
                           <input type="text" name="filmTitle" id="filmTitleId"
                           class="form-control" value="{{$film->title}}">
                        </div>
                        <div class="form-group">
                           <label for="filmGenreId">Género</label>
                           <input type="text" name="filmGenre" id="filmGenreId"
                           class="form-control" value="{{$film->genre}}">
                        </div>
                        <div class="form-group">
                            <label for="filmPremiereId">Fecha de Estreno</label>
                            <input type="date" name = "filmPremiere" id="filmPremiereId"
                            class="form-control" value="{{$film->premiere}}">
                        </div>
                        <div class="form-group text-center">
                           <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                               Editar Pelicula
                           </button>
                        </div>

                    </form>

                 </div>
            </div>
        </div>
    </div>
@endsection
