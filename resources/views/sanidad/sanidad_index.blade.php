@extends('layouts.master')
@section('page-css')
@section("titulo", "Lista Sanidad")
@section('main-content')
<div class="row">
  <section class="content p-4">
    <div class="col-md-12 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Sanidad</h3></div>
          <div class="pull-right">
            <div class="btn-group my-2 float-right">
              <a href="{{ route('sanidad.create') }}" class="btn btn-info" >Agregar</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordered">
             <thead>
               <th>Fecha</th>
               <th>Nombre del Medicamento</th>
               <th>Descripcion</th>
             </thead>
             <tbody>
              @if($sanidad->count())  
              @foreach($sanidad as $sanidada)  
              <tr>
                <td>{{$sanidada->fecha}}</td>
                <td>{{$sanidada->nombre_medica}}</td>
                <td>{{$sanidada->descripcion}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('SanidadController@edit', $sanidada->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('SanidadController@destroy', $sanidada->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8" class="text-center">No hay registro !!</td>
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