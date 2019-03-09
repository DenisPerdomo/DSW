@extends('layouts.master')

@section('content')
<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
        <div class="card">
             <div class="card-header text-center">
                Añadir Pelicula
             </div>
             <div class="card-body">
                <form action="{{ route('films.store')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                       <label for="filmTitleId">Título</label>
                       <input type="text" name="filmTitle" id="filmTitleId" class="form-control">
                    </div>
                    <div class="form-group">
                       <label for="filmGenreId">Género</label>
                       <input type="text" name="filmGenre" id="filmGenreId" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="filmPremiereId">Fecha de Estreno</label>
                        <input type="date" name = "filmPremiere" id="filmPremiereId" class="form-control">
                    </div>
                    <div class="form-group text-center">
                       <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                           Añadir Pelicula
                       </button>
                    </div>

                </form>

             </div>
        </div>
    </div>
</div>
@endsection
