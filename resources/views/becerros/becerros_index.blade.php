@extends('layouts.master')
@section('page-css')
@section("titulo", "Lista Becerros")
@section('main-content')
<div class="row">
  <section class="content card p-4">
      <div class="col-md-12 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="pull-left"><h3>Lista de Becerros</h3></div>
            <div class="pull-right">
              <div class="btn-group my-2 float-right">
                <a href="{{ route('Becerros.create') }}" class="btn btn-primary" >Agregar</a>
              </div>
            </div>
            <div class="table-container">
              <table class="table table-bordered">
                <thead>
                  <th>Numero de Registro</th>
                  <th>Fecha de Nacimiento</th>
                  <th>Nombre del Becerro</th>
                  <th>Edad del Becerro</th>
                  <th>Peso de Nacimiento</th>
                  <th>Peso al Destetar</th>
                  <th>Id de la vaca</th>
                  <th>Id del toro</th>
                  <th>Tipo de Animal</th>
                </thead>
                <tbody>
                  @if($Becerros->count())  
                  @foreach($Becerros as $becerro)  
                  <tr>
                    <td>{{$Becerros->num_registro}}</td>
                    <td>{{$Becerros->fecha_nacim}}</td>
                    <td>{{$Becerros->nombre_becerro}}</td>
                    <td>{{$Becerros->edad_becerro}}</td>
                    <td>{{$Becerros->peso_nacim}}</td>
                    <td>{{$Becerros->peso_destete}}</td>
                    <td>{{$Becerros->vaca_id}}</td>
                    <td>{{$Becerros->toro_id}}</td>
                    <td>{{$Becerros->tipo_animal_id}}</td>
                    <td><a class="btn btn-primary btn-xs" href="{{action('BecerrosController@edit', $Becerros->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td>
                      <form action="{{action('BecerrosController@destroy', $Becerros->id)}}" method="post">
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