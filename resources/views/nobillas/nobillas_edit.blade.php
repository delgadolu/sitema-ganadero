<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

@extends('layouts.master')
@section('page-css')
@section("titulo", "Registrar Becerros")
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
					<h3 class="panel-title">Nueva Novilla</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('nobillas.update',$nobillas->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Numero de Registro</label>
										<input type="text" name="num_registro" id="num_registro" class="form-control input-sm" value="{{$nobillas->num_registro}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Fecha de Nacimiento</label>
										<input type="text" name="fecha_nacim" id="fecha_nacim" class="form-control input-sm datetimepicker" value="{{$nobillas->fecha_nacim}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Nombre de la Nobilla</label>
										<input type="text" name="nombre_nobilla" id="nombre_nobilla" class="form-control input-sm" value="{{$nobillas->nombre_nobilla}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Edad de la Novilla</label>
										<input type="text" name="edad_nobilla" id="edad_nobilla" class="form-control input-sm" value="{{$nobillas->edad_nobilla}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Peso al Nacer</label>
										<input type="text" name="peso_nacim" id="peso_nacim" class="form-control input-sm" value="{{$nobillas->peso_nacim}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Peso al Destetar</label>
										<input type="text" name="peso_destete" id="peso_destete" class="form-control input-sm" value="{{$nobillas->peso_destete}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Id de la Vaca</label>
										<input type="text" name="vaca_id" id="vaca_id" class="form-control input-sm" value="{{$nobillas->vaca_id}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Id del Toro</label>
										<input type="text" name="toro_id" id="toro_id" class="form-control input-sm" value="{{$nobillas->toro_id}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Tipo de Animal</label>
										<select class="form-control" aria-label="tipo_animal" name="tipo_animal_id" id="tipo_animal_id">
										<option selected>Selecciones</option>
										@foreach ($tipoAnimal as $animal)
											<option value={{$animal->id}} <?php if ($vacas['tipo_animal_id'] == $animal['id']) echo "selected"?>>{{$animal->descripcion}}</option>
										@endforeach
										</select>
									</div>
								</div>
							</div>
							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('Nobillas.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
 
							</div>
						</form>
					</div>
				</div>
 
			</div>
		</div>
	</section>
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