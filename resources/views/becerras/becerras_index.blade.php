@extends('layouts.master')
@section('page-css')
@section("titulo", "Lista Becerras")
@section('main-content')
<div class="row">
  <section class="content card p-4">
      <div class="col-md-12 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="pull-left"><h3>Lista de Becerras</h3></div>
            <div class="pull-right">
              <div class="btn-group my-2 float-right">
                <a href="{{ route('becerras.create') }}" class="btn btn-primary" >Agregar</a>
              </div>
            </div>
            <div class="table-container">
              <table class="table table-bordered">
                <thead>
                  <th>Numero de Registro</th>
                  <th>Fecha de Nacimiento</th>
                  <th>Nombre de la Becerra</th>
                  <th>Edad de la Becerra</th>
                  <th>Peso de Nacimiento</th>
                  <th>Peso al Destetar</th>
                  <th>Id de la vaca</th>
                  <th>Id del toro</th>
                  <th>Tipo de Animal</th>
                </thead>
                <tbody>
                  @if($becerras->count())  
                  @foreach($becerras as $becerra)  
                  <tr>
                    <td>{{$becerra->num_registro}}</td>
                    <td>{{$becerra->fecha_nacim}}</td>
                    <td>{{$becerra->nombre_becerra}}</td>
                    <td>{{$becerra->edad_becerra}}</td>
                    <td>{{$becerra->peso_nacim}}</td>
                    <td>{{$becerra->peso_destete}}</td>
                    <td>{{$becerra->vaca_id}}</td>
                    <td>{{$becerra->toro_id}}</td>
                    <td>{{$becerra->tipo_animal_id}}</td>
                    <td><a class="btn btn-primary btn-xs" href="{{action('BecerrasController@edit', $becerra->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td>
                      <form action="{{action('BecerrasController@destroy', $becerra->id)}}" method="post">
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