@extends('layouts.master')

@section('title', 'Página Editar Cliente')

@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                 <div class="card-header text-center">
                    Modificar Cliente
                 </div>
                 <div class="card-body">
                    <form enctype="multipart/form-data" method="post">
                        {{ csrf_field()}}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                           <label for="clientNameId">Nombre</label>
                           <input type="text" name="clientName" id="clientNameId" class="form-control" value="{{$cliente->nombre}}">
                        </div>

                        <div class="form-group">
                            <label for="profileImageId">Imagen de Perfil</label>
                            <input type="file" name="profileImage" id="profileImageId" accept="image/png, image/jpeg" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="clientDateId">Fecha de Nacimiento</label>
                            <input type="date" name = "clientDate" id="clientDateId" class="form-control" value="{{$cliente->fecha_nacimiento}}">
                        </div>
                        <div class="form-group">
                            <label for="clientEmailId">Email</label>
                           <input type="email" name = "clientEmail" id="clientEmailId" class="form-control" value="{{$cliente->correo}}">
                        </div>

                        <div class="form-group text-center">
                           <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                               Modificar cliente
                           </button>
                        </div>

                    </form>

                 </div>
            </div>
        </div>
    </div>
@endsection
