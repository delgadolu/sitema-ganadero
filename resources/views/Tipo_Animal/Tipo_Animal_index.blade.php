@extends('layouts.master')
@section('page-css')
@section("titulo", "Tipos de Animal")
@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="pull-left"><h3>Lista Tipos de Animal</h3></div>
            <div class="btn-group my-2 float-right">   
                <a href="{{route("Tipo_Animal.create")}}" class="btn btn-primary mb-2">Agregar</a>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Descripcion</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Tipo_Animal as $value)
                    <tr>
                        <td>{{$Tipo_Animal->description}}</td>
                        <td>
                            <a class="btn btn-info" href="{{route("Tipo_Animal.edit",[$value])}}">
                                <i class="nav-icon i-Pen-5"></i> 
                            </a>
                        </td>
                        <td>
                            <form action="{{route("Tipo_Animal.destroy", [$value])}}" method="post">
                                @method("delete")
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="nav-icon i-Close-Window"></i> 
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection