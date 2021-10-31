@extends('layouts.master')
@section('page-css')
@section("titulo", "Lista toros")
@section('main-content')
<div class="row">
  <section class="content">
      <div class="col-md-12 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="pull-left"><h3>Lista toros</h3></div>
            <div class="pull-right">
              <div class="btn-group my-2 float-right">
                <a href="{{ route('toros.create') }}" class="btn btn-primary" >Agregar</a>
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
                  <th>Peso al Saltar</th>
                  <th>Desendencias Provadas</th>
                  <th>Tipo de Animal</th>
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
                    <td>{{$toro->peso_saltar}}</td>
                    <td>{{$toro->descendencia_provadas}}</td>
                    <td>{{$toro->tipo_animal_id}}</td>
                    <td><a class="btn btn-primary btn-xs" href="{{action('TorosController@edit', $toro->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td>
                      <form action="{{action('TorosController@destroy', $toro->id)}}" method="post">
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