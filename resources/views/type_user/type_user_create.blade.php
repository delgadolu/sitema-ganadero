@extends('layouts.master')
@section('page-css')
@section("titulo", "Registrar Tipo de Usuarios")
@section('main-content')    
<div class="row">
<section class="content card p-4">
        <div class="colm+-md-12">
            <form method="POST" action="{{route("type_user.store")}}">
                @csrf
                <div class="form-group">
                    <label class="label">Nombre</label>
                    <input required autocomplete="off" name="description" class="form-control"  type="text">
                </div>

                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("type_user.index")}}">Volver al listado</a>
            </form>
        </div>
    </div>
    </section>
@endsection