@extends('layouts.master')
@section('page-css')
@section("titulo", "Lista Toretes")
@section('main-content')
<div class="row">
  <section class="content card p-4">
      <div class="col-md-12 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="pull-left"><h3>Lista de Toretes</h3></div>
            <div class="pull-right">
              <div class="btn-group my-2 float-right">
                <a href="{{ route('toretes.create') }}" class="btn btn-primary" >Agregar</a>
                <a href="toretes_download" class="btn btn-success mx-2" >Reporte</a>
              </div>
            </div>
            <div class="table-container">
              <table class="table table-bordered">
                <thead>
                  <th>Numero de Registro</th>
                  <th>Fecha de Nacimiento</th>
                  <th>Nombre del Torete</th>
                  <th>Edad del Torete</th>
                  <th>Peso de Nacimiento</th>
                  <th>Peso al Destetar</th>
                  <th>Numero de Registro del Padre</th>
                  <th>Numero de Registro de la Madre</th>
                  <th>Tipo de Animal</th>
                </thead>
                <tbody>
                  @if($toretes->count())  
                  @foreach($toretes as $torete)  
                  <tr>
                    <td>{{$torete->num_registro}}</td>
                    <td>{{$torete->fecha_nacim}}</td>
                    <td>{{$torete->nombre_torete}}</td>
                    <td>{{$torete->edad_torete}}</td>
                    <td>{{$torete->peso_nacim}}</td>
                    <td>{{$torete->peso_destete}}</td>
                    <td>{{$torete->num_registro_papa}}</td>
                    <td>{{$torete->num_registro_mama}}</td>
                    <td>{{$torete->tipo_animal_id}}</td>
                    <td><a class="btn btn-primary btn-xs" href="{{action('ToretesController@edit', $torete->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td>
                      <form action="{{action('ToretesController@destroy', $torete->id)}}" method="post">
                      {{csrf_field()}}
                      <input name="_method" type="hidden" value="DELETE">
    
                      <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                    </td>
                  </tr>
                  @endforeach 
                  @else
                  <tr>
                    <td colspan="10" class="text-center">No hay registro !!</td>
                  </tr>
                  @endif
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
 
@endsection