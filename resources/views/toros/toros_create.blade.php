@extends('layouts.master')
@section('page-css')
@section("titulo", "Registrar Toros")
@section('main-content') 
<div class="row">
	<section class="content card p-4">
		<div class="col-md-12">
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
					<h3 class="panel-title">Nuevo Toro</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('toros.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Numero de Registro</label>
										<input type="text" name="num_registro" id="num_registro" class="form-control input-sm" placeholder="Numero de Registro">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Fecha de Nacimiento</label>
										<input type="text" name="fecha_nacim" id="fecha_nacim" class="form-control input-sm">
									</div>
								</div>

							</div>
							<div class="form-group">
								<label class="label">Nombre</label>
								<div name="nombre_toro" id="nombre_toro" class="form-control input-sm">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Edad toro</label>
										<input type="text" name="edad_toro" id="edad_toro" class="form-control input-sm">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<label class="label">Peso Al Nacimiento</label>
									<div class="form-group">
										<input type="text" name="peso_nacin" id="peso_nacin" class="form-control input-sm" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Peso al Destete</label>
										<input type="text" name="peso_destete" id="peso_destete" class="form-control input-sm">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<label class="label">Peso al Saltar</label>
									<div class="form-group">
										<input type="text" name="peso_saltar" id="peso_saltar" class="form-control input-sm">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Desendencia Provada</label>
										<input type="text" name="desendencia_provadas" id="desendencia_provadas" class="form-control input-sm">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<label class="label">Tipo de Animal</label>
									<select class="form-control" aria-label="tipo_animal">
										<option selected>Selecciones</option>
										<option value="1">Animal de Leche</option>
										<option value="2">Animal de Carne</option>
										<option value="3">Animal Doble proposito</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<button class="btn btn-success">Guardar</button>
                					<a class="btn btn-primary" href="{{route('toros.index')}}">Volver al listado</a>
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