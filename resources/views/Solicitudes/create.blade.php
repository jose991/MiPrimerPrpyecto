@extends('admin.layout')

@section('content')
<h1>
<h2>Nuevo registro de SOLICITUD</h2>
</h1>
<div class="container">
	<div class="row ">
		<div class="col-sm-6">
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
		</div>
	</div>
	<form method="POST" action="{{ route('solicitudes.store') }}" enctype="multipart/form-data">
		{{ csrf_field() }}

		<div class="row">
			<div class="col-sm-11">
				<div class="form-group col-sm-4">
					<label>Nombre solicitante</label>
					<input type="text" name="nombreSolicitante"  class="form-control" placeholder="Nombre del solicitante">
				</div>
				<div class="form-group col-sm-4">
					<label>Carrera que solicita la peticion</label>
					<input type="text" name="carreraSolicita"  class="form-control" placeholder="Carrera que solicita la peticion">
				</div>
				<div class="form-group col-sm-4">
					<label>Nombre evento</label>
					<input type="text" name="nombreEvento"  class="form-control" placeholder="Nombre del evento">
				</div>
			</div>
  		</div>

  		<div class="row">
  			<div class="col-sm-11">
	  			<div class="form-group col-sm-5">
					<label>Nombre practica</label>
					<input type="text" name="nombrePractica"  class="form-control" placeholder="Nombre de la practica">
				</div>

				<div class="form-group col-md-5">
					<label>Fecha</label>
					<input type="text" name="fecha" class="form-control input-sm" placeholder="Fecha del evento">
				</div>
			</div>
  		</div>

  		<div class="row">
  			<div class="col-sm-11">
				<div class="form-group col-md-6">
					<label>Hora inicio</label>
					<input type="text" name="horaInicio" class="form-control input-sm" placeholder="Hora de inicio de evento">
				</div>
				<div class="form-group col-md-5">
					<label>Hora fin</label>
					<input type="text" name="horaFin" class="form-control input-sm" placeholder="Hora finalizacion del evento">
				</div>
			</div>
  		</div>

  		<div class="row">
	  		<div class="form-group col-md-11">
	  			<div class="form-group col-md-6">
	  				<label>Carrera</label>
	  				<select name="category_id" class="form-control">
	  					<option selected disabled>Elige la carrera correspondiente...</option>
	  					@foreach($categorias as $categoria)
	  					<option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
	  					@endforeach
	  				</select>
	  			</div>

	  			<div class="form-group col-md-6">
	  				<label>Laboratorio o area comun</label>
	  				<select name="laboratory_id" class="form-control">
	  					<option selected disabled>Elige el laboratorio o area comun...</option>
	  					@foreach($laboratorios as $laboratorio)
	  					<option value="{{ $laboratorio->id }}">{{ $laboratorio->nombre }}</option>
	  					@endforeach
	  				</select>
	  			</div>
	  		</div>
	  	</div>
  		

		<div class="row">
			<div class="form-group col-md-11">
				<div class="form-group col-md-6">
					<button type="submit" class="btn btn-primary">Registrar</button>
					<a href="{{ route('solicitudes.index') }}" class="btn btn-danger" >Atrás</a>
				</div>
			</div>
  		</div>
	</form>
</div>
@endsection