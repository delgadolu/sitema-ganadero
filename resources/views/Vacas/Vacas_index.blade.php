@extends('layouts.master')
@section('page-css')
@section("titulo", "Lista Vacas")
@section('main-content')
<div class="row">
  <section class="content card p-4">
      <div class="col-md-12 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="pull-left"><h3>Lista Vacas</h3></div>
            <div class="pull-right">
              <div class="btn-group my-2 float-right">
                <a href="{{ route('Vacas.create') }}" class="btn btn-primary" >Agregar</a>
              </div>
            </div>
            <div class="table-container">
              <table class="table table-bordered">
                <thead>
                  <th>Numero de Registro</th>
                  <th>Fecha de Nacimiento</th>
                  <th>Nombre de la Vaca</th>
                  <th>Edad de la Vaca</th>
                  <th>Peso de Nacimiento</th>
                  <th>Peso al Destetar</th>
                  <th>Peso al Primer Servicio</th>
                  <th>Edad al Servicio</th>
                  <th>Numero de Partos</th>
                  <th>Hijas Provadas</th>
                  <th>Tipo de Animal</th>
                </thead>
                <tbody>
                  @if($Vacas->count())  
                  @foreach($Vacas as $Vacas)  
                  <tr>
                    <td>{{$Vacas->num_registro}}</td>
                    <td>{{$Vacas->fecha_nacim}}</td>
                    <td>{{$Vacas->nombre_vaca}}</td>
                    <td>{{$Vacas->edad_vaca}}</td>
                    <td>{{$Vacas->peso_nacim}}</td>
                    <td>{{$Vacas->peso_destete}}</td>
                    <td>{{$Vacas->peso_pri_servi}}</td>
                    <td>{{$Vacas->edad_servi}}</td>
                    <td>{{$Vacas->peso_pri_servi}}</td>
                    <td>{{$Vacas->num_partos}}</td>
                    <td>{{$Vacas->hijas_provadas}}</td>
                    <td>{{$Vacas->tipo_animal_id}}</td>
                    <td><a class="btn btn-primary btn-xs" href="{{action('VacasController@edit', $Vacas->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td>
                      <form action="{{action('VacasController@destroy', $Vacas->id)}}" method="post">
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