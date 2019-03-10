@extends('layouts.master')

@section('title', 'Página Alta Cliente')

@section('content')
<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
        <div class="card">
             <div class="card-header text-center">
                Añadir cliente
             </div>
             <div class="card-body">
                <form action="" method="post" enctype=”multipart/form-data”>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="clientNameId">Nombre</label>
                        <input type="text" name="clientName" id="clientNameId"
                        class="form-control {!!$errors->first('clientName','is-invalid')!!}"
                        value="{{old('clientName')}}">
                        {!!$errors->first('clientName','<div class="invalid-feedback">:message</div>')!!}
                    </div>
                    <div class="form-group">
                        <label for="profileImageId">Imagen de Perfil</label>
                        <input type="file" name="profileImage" id="profileImageId" accept="image/png, image/jpeg" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="clientDateId">Fecha de Nacimiento</label>
                        <input type="text" name = "clientDate" id="clientDateId"
                        class="form-control {!!$errors->first('clientDate','is-invalid')!!}"
                        value="{{old('clientDate')}}">
                        {!!$errors->first('clientDate','<div class="invalid-feedback">:message</div>')!!}
                    </div>
                    <div class="form-group">
                        <label for="clientEmailId">Email</label>
                        <input type="text" name = "clientEmail" id="clientEmailId"
                        class="form-control {!!$errors->first('clientEmail','is-invalid')!!}"
                        value="{{old('clientEmail')}}">
                        {!!$errors->first('clientEmail','<div class="invalid-feedback">:message</div>')!!}
                    </div>
                    <div class="form-group text-center">
                       <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                           Añadir cliente
                       </button>
                    </div>

                </form>

             </div>
        </div>
    </div>
</div>
@endsection
