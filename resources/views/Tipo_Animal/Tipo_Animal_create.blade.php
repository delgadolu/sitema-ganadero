@extends('layouts.master')
@section('page-css')
@section("titulo", "Registrar Tipo de Animal")
@section('main-content')    
<div class="row">
<section class="content card p-4">
        <div class="colm+-md-12">
            <form method="POST" action="{{route("Tipo_Animal.store")}}">
                @csrf
                <div class="form-group">
                    <label class="label">Descripcion</label>
                    <input required autocomplete="off" name="descripcion" class="form-control" type="text">
                </div>

                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("Tipo_Animal.index")}}">Volver al listado</a>
            </form>
        </div>
    </div>
    </section>
@endsection