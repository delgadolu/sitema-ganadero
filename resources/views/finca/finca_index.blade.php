@extends('layouts.master')
@section('page-css')
@section("titulo", "Lista Finca")
@section('main-content')
<div class="row">
  <section class="content p-4">
    <div class="col-md-12 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Fincas</h3></div>
          <div class="pull-right">
            <div class="btn-group my-2 float-right">
              <a href="{{ route('finca.create') }}" class="btn btn-info" >Agregar</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordered">
             <thead>
               <th>Nombre de la Finca</th>
               <th>Cantidad de Metros</th>
               <th>Total de Animales</th>
               <th>Pasto Usado en la finca</th>
               <th colspan="2" class="text-center">Editar/Borrar</th>
             </thead>
             <tbody>
              @if($finca->count())  
              @foreach($finca as $fincas)  
              <tr>
                <td>{{$fincas->nombre}}</td>
                <td>{{$fincas->cant_metros}}</td>
                <td>{{$fincas->total_animales}}</td>
                <td>{{$fincas->pasto_usado}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('FincaController@edit', $fincas->id)}}" ><i class="nav-icon i-Pen-5"></i></span></a></td>
                <td>
                  <form action="{{action('FincaController@destroy', $fincas->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
                   <button class="btn btn-danger btn-xs" type="submit"><i class="nav-icon i-Close-Window"></i></span></button>
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