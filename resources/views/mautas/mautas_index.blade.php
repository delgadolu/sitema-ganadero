@extends('layouts.master')
@section('page-css')
@section("titulo", "Lista Mautas")
@section('main-content')
<div class="row">
  <section class="content card p-4">
      <div class="col-md-12 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="pull-left"><h3>Lista de Mautas</h3></div>
            <div class="pull-right">
              <div class="btn-group my-2 float-right">
                <a href="{{ route('mautas.create') }}" class="btn btn-primary" >Agregar</a>
                <a href="mautas_download" class="btn btn-success mx-2" >Reporte</a>
              </div>
            </div>
            <div class="table-container">
              <table class="table table-bordered">
                <thead>
                  <th>Numero de Registro</th>
                  <th>Fecha de Nacimiento</th>
                  <th>Nombre de la Mauta</th>
                  <th>Edad de la Mauta</th>
                  <th>Peso de Nacimiento</th>
                  <th>Peso al Destetar</th>
                  <th>Numero de Registro del Padre</th>
                  <th>Numero de Registro del Madre</th>
                  <th>Tipo de Animal</th>
                </thead>
                <tbody>
                  @if($mautas->count())  
                  @foreach($mautas as $mauta)  
                  <tr>
                    <td>{{$mauta->num_registro}}</td>
                    <td>{{$mauta->fecha_nacim}}</td>
                    <td>{{$mauta->nombre_mauta}}</td>
                    <td>{{$mauta->edad_mauta}}</td>
                    <td>{{$mauta->peso_nacim}}</td>
                    <td>{{$mauta->peso_destete}}</td>
                    <td>{{$mauta->num_registro_papa}}</td>
                    <td>{{$mauta->num_registro_mama}}</td>
                    <td>{{$mauta->tipo_animal_id}}</td>
                    <td><a class="btn btn-primary btn-xs" href="{{action('MautasController@edit', $mauta->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td>
                      <form action="{{action('MautasController@destroy', $mauta->id)}}" method="post">
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