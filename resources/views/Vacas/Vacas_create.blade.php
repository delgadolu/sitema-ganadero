<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
@extends('layouts.master')
@section('page-css')
@section("titulo", "Registrar Vacas")
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
					<h3 class="panel-title">Nuevo Vaca</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('Vacas.store') }}"  role="form">
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
										<input type="text" name="fecha_nacim" id="fecha_nacim" class="form-control input-sm datetimepicker">
									</div>
								</div>

							</div>
							<div class="form-group">
								<label class="label">Nombre de la Vaca</label>
								<input type="text" name="nombre_vaca" id="nombre_vaca" class="form-control input-sm">
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<label class="label">Peso Al Nacimiento</label>
									<div class="form-group">
										<input type="text" name="peso_nacim" id="peso_nacim" class="form-control input-sm" >
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Peso al Destete</label>
										<input type="text" name="peso_destete" id="peso_destete" class="form-control input-sm">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<label class="label">Peso al Primer Servicio</label>
									<div class="form-group">
										<input type="text" name="peso_primer_servi" id="peso_primer_servi" class="form-control input-sm">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Edad al Servicio</label>
										<input type="text" name="edad_servi" id="edad_servi" class="form-control input-sm">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<label class="label">Numero de Partos</label>
									<input type="text" name="num_partos" id="num_partos" class="form-control input-sm">
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Hijas Provadas</label>
										<input type="text" name="hijas_provadas" id="hijas_provadas" class="form-control input-sm">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<label class="label">Tipo de Animal</label>
									<select class="form-control" aria-label="tipo_animal" name="tipo_animal_id" id="tipo_animal_id">
										<option selected>Selecciones</option>
										<option value="1">Animal de Leche</option>
										<option value="2">Animal de Carne</option>
										<option value="3">Animal Doble proposito</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 my-4">
									<button class="btn btn-success">Guardar</button>
                					<a class="btn btn-primary" href="{{route('Vacas.index')}}">Volver al listado</a>
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
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">
	$(function() {
		$('.datetimepicker').datetimepicker({
			viewMode: 'years',
            format: 'YYYY-MM-DD'
		});
	});
</script> 
@endsection