@extends('layouts.master')
@section('page-css')
@section("titulo", "Lista Toros")
@section('main-content')
<div class="row">
  <section class="content card p-4">
      <div class="col-md-12 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="pull-left"><h3>Lista Toros</h3></div>
            <div class="pull-right">
              <div class="btn-group my-2 float-right">
                <a href="{{ route('toros.create') }}" class="btn btn-primary" >Agregar</a>
                <a href="toros_download" class="btn btn-success mx-2" >Reporte</a>
              </div>
            </div>
            <div class="table-container">
              <table class="table table-bordered">
                <thead>
                  <th>Numero de Registro</th>
                  <th>Fecha de Nacimiento</th>
                  <th>Nombre del Toro</th>
                  <th>Edad del Toro</th>
                  <th>Peso de Nacimiento</th>
                  <th>Peso al Destetar</th>
                  <th>Peso de Inclusion al Servicio</th>
                  <th>Hijas Provadas</th>
                  <th>Numero de Registro del Padre</th>
                  <th>Numero de Registro de la Madre</th>
                  <th>Tipo de Animal</th>
                  <th colspan="2" class="text-center">Editar/Borrar</th>
                </thead>
                <tbody>
                  @if($toros->count())  
                  @foreach($toros as $toro)  
                  <tr>
                    <td>{{$toro->num_registro}}</td>
                    <td>{{$toro->fecha_nacim}}</td>
                    <td>{{$toro->nombre_toro}}</td>
                    <td>{{$toro->edad_toro}}</td>
                    <td>{{$toro->peso_nacim}}</td>
                    <td>{{$toro->peso_destete}}</td>
                    <td>{{$toro->peso_inclu_servi}}</td>
                    <td>{{$toro->hijas_provadas}}</td>
                    <td>{{$toro->num_registro_papa}}</td>
                    <td>{{$toro->num_registro_mama}}</td>
                    <td>{{$toro->tipo_animal_id}}</td>
                    <td><a class="btn btn-primary btn-xs" href="{{action('TorosController@edit', $toro->id)}}" > <i class="nav-icon i-Pen-5"></i> </span></a></td>
                    <td>
                      <form action="{{action('TorosController@destroy', $toro->id)}}" method="post">
                      {{csrf_field()}}
                      <input name="_method" type="hidden" value="DELETE">
    
                      <button class="btn btn-danger btn-xs" type="submit"><i class="nav-icon i-Close-Window"></i> </button>
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