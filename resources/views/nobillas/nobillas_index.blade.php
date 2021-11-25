@extends('layouts.master')
@section('page-css')
@section("titulo", "Lista Novillas")
@section('main-content')
<div class="row">
  <section class="content card p-4">
      <div class="col-md-12 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="pull-left"><h3>Lista de Novillas</h3></div>
            <div class="pull-right">
              <div class="btn-group my-2 float-right">
                <a href="{{ route('nobillas.create') }}" class="btn btn-primary" >Agregar</a>
                <a href="nobillas_download" class="btn btn-success mx-2" >Reporte</a>
              </div>
            </div>
            <div class="table-container">
              <table class="table table-bordered">
                <thead>
                  <th>Numero de Registro</th>
                  <th>Fecha de Nacimiento</th>
                  <th>Nombre de la Novilla</th>
                  <th>Edad de la Novilla</th>
                  <th>Peso de Nacimiento</th>
                  <th>Peso al Destetar</th>
                  <th>Numero de Registro del Padre</th>
                  <th>Numero de Registro de la Madre</th>
                  <th>Tipo de Animal</th>
                  <th colspan="2" class="text-center">Editar/Borrar</th>
                </thead>
                <tbody>
                  @if($nobillas->count())  
                  @foreach($nobillas as $nobilla)  
                  <tr>
                    <td>{{$nobilla->num_registro}}</td>
                    <td>{{$nobilla->fecha_nacim}}</td>
                    <td>{{$nobilla->nombre_nobilla}}</td>
                    <td>{{$nobilla->edad_nobilla}}</td>
                    <td>{{$nobilla->peso_nacim}}</td>
                    <td>{{$nobilla->peso_destete}}</td>
                    <td>{{$nobilla->num_registro_papa}}</td>
                    <td>{{$nobilla->num_registro_mama}}</td>
                    <td>{{$nobilla->tipo_animal_id}}</td>
                    <td><a class="btn btn-primary btn-xs" href="{{action('NobillasController@edit', $nobilla->id)}}" ><i class="nav-icon i-Pen-5"></i></span></a></td>
                    <td>
                      <form action="{{action('NobillasController@destroy', $nobilla->id)}}" method="post">
                      {{csrf_field()}}
                      <input name="_method" type="hidden" value="DELETE">
                      <button class="btn btn-danger btn-xs" type="submit"><i class="nav-icon i-Close-Window"></i></span></button>
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