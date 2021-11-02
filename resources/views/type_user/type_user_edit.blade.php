@extends('layouts.master')
@section('page-css')
@section("titulo", "Editar Tipo de Usuario")
@section('main-content')    
 <div class="row">
        <div class="col-6">
            <form method="POST" action="{{route("type_user.update", [$typeUsers])}}">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label class="label">Nombre</label>
                    <input required value="{{$typeUsers->description}}" autocomplete="off" name="description" class="form-control" type="text">
                </div>
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("type_user.index")}}">Volver</a>
            </form>
        </div>
    </div>
@endsection