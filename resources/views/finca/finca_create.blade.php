@extends('layouts.master')
@section('page-css')
@section("titulo", "Lista Fincas")
@section('main-content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif
 
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Nueva Finca</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('finca.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Nombre de la Finca</label>
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre de la Finca">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Cantidad de Metros</label>
										<input type="text" name="cant_metros" id="cant_metros" class="form-control input-sm" placeholder="Cantidad de Metros">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Total de Animales</label>
										<input type="text" name="total_animales" id="total_animales" class="form-control input-sm" placeholder="Total de Animales">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Pasto Usado en la Finca</label>
										<input type="text" name="pasto_usado" id="pasto_usado" class="form-control input-sm" placeholder="Pasto Usado en la Finca">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('finca.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
 
							</div>
						</form>
					</div>
				</div>
 
			</div>
		</div>
	</section>
</div>
@endsection