<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

@extends('layouts.master')
@section('page-css')
@section("titulo", "Registrar Toretes")
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
					<h3 class="panel-title">Nuevo Torete</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('toretes.store') }}"  role="form" enctype="multipart/form-data">
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

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Nombre del Torete</label>
										<input type="text" name="nombre_torete" id="nombre_torete" class="form-control input-sm" >
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Edad del Torete</label>
										<input type="text" name="edad_torete" id="edad_torete" class="form-control input-sm" >
									</div>
								</div>		
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Peso Al Nacimiento</label>
										<input type="text" name="peso_nacim" id="peso_nacim" class="form-control input-sm" >
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Peso al Destete</label>
										<input type="text" name="peso_destete" id="peso_destete" class="form-control input-sm" >
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Numero de Registro del Padre</label>
										<input type="text" name="num_registro_papa" id="num_registro_papa" class="form-control input-sm" >
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Numero de Registro de la Madre</label>
										<input type="text" name="num_registro_mama" id="num_registro_mama" class="form-control input-sm" >
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<label class="label">Tipo de Animal</label>
									<select class="form-control" aria-label="tipo_animal" name="tipo_animal_id" id="tipo_animal_id">
										<option selected>Selecciones</option>
										@foreach ($tipoAnimal as $animal)
											<option value={{$animal->id}}>{{$animal->descripcion}}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 my-3">
								<div class="input-group">
                                        <div class="custom-file-image">
                                            <input type="file"
                                                name="img_torete"
                                                id="img_torete"
                                                class="custom-file-input"
                                                data-required="false"
                                                data-value=""
                                                data-extensions="image"
                                                data-suggested-dimensions="200x100"
                                                data-description="imagen del Torete"
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
												name="img_padre_torete"
												id="img_padre_torete"
												class="custom-file-input"
												data-required="false"
                                                data-value=""
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
												name="img_madre_torete"
												id="img_madre_torete"
												class="custom-file-input"
												data-required="false"
                                                data-value=""
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
									<button class="btn btn-success">Guardar</button>
                					<a class="btn btn-primary" href="{{route('toretes.index')}}">Volver al listado</a>
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

<!--

							<div class="row">	
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
									<label class="label">Id de la Vaca</label>
										<select class="form-control" name="vaca_id" id="vaca_id">
											<option selected>Selecciones</option>
											@foreach ($vacas as $vaca)
												<option value={{$vaca->id}}>{{$vaca->nombre_vaca}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<label class="label">Id del Toro</label>
										<select class="form-control" name="toro_id" id="toro_id">
											<option selected>Selecciones</option>
											@foreach ($toros as $toro)
												<option value={{$toro->id}}>{{$toro->nombre_toro}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>	

-->