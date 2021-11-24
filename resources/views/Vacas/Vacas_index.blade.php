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
                <a href="{{ route('Vacas.create') }}" class="btn btn-primary" >
                Agregar</a>
                <a href="Vacas_download" class="btn btn-success mx-2" >Reporte</a>
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
                  <th>Numero de Registro del Padre</th>
                  <th>Numero de Registro de la Madre</th>
                  <th>Tipo de Animal</th>
                  <th colspan="2" class="text-center">Editar/Borrar</th>
                </thead>
                <tbody>
                  @if($vacas->count())  
                  @foreach($vacas as $vaca)  
                  <tr>
                    <td>{{$vaca->num_registro}}</td>
                    <td>{{$vaca->fecha_nacim}}</td>
                    <td>{{$vaca->nombre_vaca}}</td>
                    <td>{{$vaca->edad_vaca}}</td>
                    <td>{{$vaca->peso_nacim}}</td>
                    <td>{{$vaca->peso_destete}}</td>
                    <td>{{$vaca->peso_primer_servi}}</td>
                    <td>{{$vaca->edad_servi}}</td>
                    <td>{{$vaca->num_partos}}</td>
                    <td>{{$vaca->hijas_provadas}}</td>
                    <td>{{$vaca->num_registro_papa}}</td>
                    <td>{{$vaca->num_registro_mama}}</td>
                    <td>{{$vaca->tipo_animal_id}}</td>
                    <td><a class="btn btn-primary btn-xs" href="{{action('VacasController@edit', $vaca->id)}}" > <i class="nav-icon i-Pen-5"></i>  </a></td>
                    <td>
                      <form action="{{action('VacasController@destroy', $vaca->id)}}" method="post">
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