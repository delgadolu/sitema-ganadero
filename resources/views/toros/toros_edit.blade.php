<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

@extends('layouts.master')
@section('page-css')
@section("titulo", "Registrar Toros")
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
					<h3 class="panel-title">Nuevo Toro</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('toros.update',$toros->id) }}"  role="form" enctype="multipart/form-data">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Numero de Registro</label>
										<input type="text" name="num_registro" id="num_registro" class="form-control input-sm" value="{{$toros->num_registro}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Fecha de Nacimiento</label>
										<input type="text" name="fecha_nacim" id="fecha_nacim" class="form-control input-sm datetimepicker" value="{{$toros->fecha_nacim}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Nombre del Toro</label>
										<input type="text" name="nombre_toro" id="nombre_toro" class="form-control input-sm" value="{{$toros->edad_toro}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Edad del Toro</label>
										<input type="text" name="edad_toro" id="edad_toro" class="form-control input-sm" value="{{$toros->edad_toro}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Peso Al Nacimiento</label>
										<input type="text" name="peso_nacim" id="peso_nacim" class="form-control input-sm" value="{{$toros->peso_nacim}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Peso al Destete</label>
										<input type="text" name="peso_destete" id="peso_destete" class="form-control input-sm" value="{{$toros->peso_destete}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Peso de Inclusion al Servicio</label>
										<input type="text" name="peso_inclu_servi" id="peso_inclu_servi" class="form-control input-sm" value="{{$toros->peso_inclu_servi}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Hijas Provadas</label>
										<input type="text" name="hijas_provadas" id="hijas_provadas" class="form-control input-sm" value="{{$toros->hijas_provadas}}">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Numero de Registro del Padre</label>
										<input type="text" name="num_registro_papa" id="num_registro_papa" class="form-control input-sm" value="{{$toros->num_registro_papa}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Numero de Registro de la Madre</label>
										<input type="text" name="num_registro_mama" id="num_registro_mama" class="form-control input-sm" value="{{$toros->num_registro_mama}}">
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
											<option value={{$animal->id}} <?php if ($toros['tipo_animal_id'] == $animal['id']) echo "selected"?>>{{$animal->descripcion}}</option>
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
                                                name="img_toro"
                                                id="img_toro"
                                                class="custom-file-input"
                                                data-required="false"
                                                data-value="../../uploads/toros/{{$toros->img_toro}}"
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
												name="img_padre_toro"
												id="img_padre_toro"
												class="custom-file-input"
												data-required="false"
                                                data-value="../../uploads/toros/{{$toros->img_padre_toro}}"
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
												name="img_madre_toro"
												id="img_madre_toro"
												class="custom-file-input"
												data-required="false"
                                                data-value="../../uploads/toros/{{$toros->img_madre_toro}}"
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
									<a href="{{ route('toros.index') }}" class="btn btn-info btn-block" >Atr??s</a>
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
@section('page-js')
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