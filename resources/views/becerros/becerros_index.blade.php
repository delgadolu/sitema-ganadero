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
                <a href="{{ route('becerros.create') }}" class="btn btn-primary" >Agregar</a>
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
                  <th colspan="2" class="text-center">Editar/Borrar</th>
                </thead>
                <tbody>
                  @if($becerros->count())  
                  @foreach($becerros as $becerro)  
                  <tr>
                    <td>{{$becerro->num_registro}}</td>
                    <td>{{$becerro->fecha_nacim}}</td>
                    <td>{{$becerro->nombre_becerro}}</td>
                    <td>{{$becerro->edad_becerro}}</td>
                    <td>{{$becerro->peso_nacim}}</td>
                    <td>{{$becerro->peso_destete}}</td>
                    <td>{{$becerro->vaca_id}}</td>
                    <td>{{$becerro->toro_id}}</td>
                    <td>{{$becerro->tipo_animal_id}}</td>
                    <td><a class="btn btn-primary btn-xs" href="{{action('BecerrosController@edit', $becerro->id)}}" ><i class="nav-icon i-Pen-5"></i></span></a></td>
                <td>
                  <form action="{{action('BecerrosController@destroy', $becerro->id)}}" method="post">
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