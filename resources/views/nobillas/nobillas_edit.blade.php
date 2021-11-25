<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

@extends('layouts.master')
@section('page-css')
@section("titulo", "Registrar Becerros")
@section('main-content')
<div class="row">
	<section class="content">
		<div class="col-md-12 col-md-offset-2">
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
					<h3 class="panel-title">Editar Novilla</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('nobillas.update',$nobillas->id) }}"  role="form" enctype="multipart/form-data">
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
										<label class="label">Numero de Regitro del Padre</label>
										<input type="text" name="num_registro_papa" id="num_registro_papa" class="form-control input-sm" value="{{$nobillas->num_registro_papa}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Numero de Regitro de la Madre</label>
										<input type="text" name="num_registro_mama" id="num_registro_mama" class="form-control input-sm" value="{{$nobillas->num_registro_mama}}">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Vaca</label>
										<select class="form-control" aria-label="vaca_id" name="vaca_id" id="vaca_id">
										<option selected>Seleccione</option>
										@foreach ($vacas as $vaca)
											<option value={{$vaca->id}} <?php if ($nobillas['vaca_id'] == $vaca['id']) echo "selected"?>>{{$vaca->nombre_vaca}}</option>
										@endforeach
										</select>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Toro</label>
										<select class="form-control" aria-label="toro_id" name="toro_id" id="toro_id">
										<option selected>Seleccione</option>
										@foreach ($toros as $toro)
											<option value={{$toro->id}} <?php if ($nobillas['toro_id'] == $toro['id']) echo "selected"?>>{{$toro->nombre_toro}}</option>
										@endforeach
										</select>
									</div>
								</div>
								
							</div>


							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Tipo de Animal</label>
										<select class="form-control" aria-label="tipo_animal_id" name="tipo_animal_id" id="tipo_animal_id">
										<option selected>Selecciones</option>
										@foreach ($tipoAnimal as $animal)
											<option value={{$animal->id}} <?php if ($nobillas['tipo_animal_id'] == $animal['id']) echo "selected"?>>{{$animal->descripcion}}</option>
										@endforeach
										</select>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 my-3">
								<div class="input-group">
                                        <div class="custom-file-image">
                                            <input type="file"
                                                name="img_nobilla"
                                                id="img_nobilla"
                                                class="custom-file-input"
                                                data-required="false"
                                                data-value="../../uploads/nobillas/{{$nobillas->img_nobilla}}"
                                                data-extensions="image"
                                                data-suggested-dimensions="200x100"
                                                data-description="imagen del Toro"
                                                data-default="{{asset('assets/images/noLogo.png')}}"
                                                />
                                        </div>
                                    </div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 my-3">
									<div class="input-group">
										<div class="custom-file-image">
											<input type="file"
												name="img_padre_nobilla"
												id="img_padre_nobilla"
												class="custom-file-input"
												data-required="false"
                                                data-value="../../uploads/nobillas/{{$nobillas->img_padre_nobilla}}"
                                                data-extensions="image"
                                                data-suggested-dimensions="200x100"
                                                data-description="imagen del Padre"
                                                data-default="{{asset('assets/images/noLogo.png')}}"
												/>
										</div>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 my-3">
									<div class="input-group">
										<div class="custom-file-image">
											<input type="file"
												name="img_madre_nobilla"
												id="img_madre_nobilla"
												class="custom-file-input"
												data-required="false"
                                                data-value="../../uploads/nobillas/{{$nobillas->img_madre_nobilla}}"
                                                data-extensions="image"
                                                data-suggested-dimensions="200x100"
                                                data-description="imagen de la Madre"
                                                data-default="{{asset('assets/images/noLogo.png')}}"
												/>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('nobillas.index') }}" class="btn btn-info btn-block" >Atrás</a>
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