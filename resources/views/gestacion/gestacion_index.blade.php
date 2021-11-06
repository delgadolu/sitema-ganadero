@extends('layouts.master')
@section('page-css')
@section("titulo", "Lista Gestacion")
@section('main-content')
<div class="row">
  <section class="content p-4">
      <div class="col-md-12 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="pull-left"><h3>Lista de Gestacion</h3></div>
            <div class="pull-right">
              <div class="btn-group my-2 float-right">
                <a href="{{ route('gestacion.create') }}" class="btn btn-info" >Agregar</a>
              </div>
            </div>
            <div class="table-container">
              <table id="mytable" class="table table-bordered">
                <thead>
                  <th>Fecha de Gestacion</th>
                  <th>Id de la vaca</th>
                  <th>Id del toro</th>
                </thead>
                <tbody>
                  @if($gestacion->count())  
                  @foreach($gestacion as $gesta)  
                  <tr>
                    <td>{{$gesta->fecha_gesta}}</td>
                    <td>{{$gesta->vaca_id}}</td>
                    <td>{{$gesta->toro_id}}</td>
                    <td><a class="btn btn-primary btn-xs" href="{{action('GestacionController@edit', $gesta->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td>
                      <form action="{{action('GestacionController@destroy', $gesta->id)}}" method="post">
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