@extends('layouts.master')
@section('page-css')
@section("titulo", "Editar Tipo de Animal")
@section('main-content')    
 <div class="row">
        <div class="col-6">
            <form method="POST" action="{{route("Tipo_Animal.update", [$Tipo_Animal])}}">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label class="label">Nombre</label>
                    <input required value="{{$Tipo_Animal->descripcion}}" autocomplete="off" name="descripcion" class="form-control" type="text">
                </div>
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("Tipo_Animal.index")}}">Volver</a>
            </form>
        </div>
    </div>
@endsection