@extends('admin.layout')

@section('content')
<h1>
<h3>Editar solicitud: {{$solicitud->nombre}}</h3>
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
	<form action="{{ route('solicitudes.update',$solicitud->id) }}" method="POST" enctype="multipart/form-data">
		<input name="_method" type="hidden" value="PATCH">
		{{ csrf_field() }}

		<div class="row">
			<div class="col-sm-11">
				<div class="form-group col-sm-4">
					<label>Nombre solicitante</label>
					<input type="text" name="nombreSolicitante"  class="form-control" value="{{$solicitud->nombreSolicitante}}">
				</div>
				<div class="form-group col-sm-4">
					<label>Carrera que solicita la peticion</label>
					<input type="text" name="carreraSolicita"  class="form-control" value="{{$solicitud->carreraSolicita}}">
				</div>
				<div class="form-group col-sm-4">
					<label>Nombre evento</label>
					<input type="text" name="nombreEvento"  class="form-control" value="{{$solicitud->nombreEvento}}">
				</div>
			</div>
  		</div>

  		<div class="row">
  			<div class="col-sm-11">
	  			<div class="form-group col-sm-5">
					<label>Nombre practica</label>
					<input type="text" name="nombrePractica"  class="form-control" value="{{$solicitud->nombrePractica}}">
				</div>

				<div class="form-group col-md-5">
					<label>Fecha</label>
					<input type="text" name="fecha" class="form-control input-sm" value="{{$solicitud->fecha}}">
				</div>
			</div>
  		</div>

  		<div class="row">
  			<div class="col-sm-11">
				<div class="form-group col-md-6">
					<label>Hora inicio</label>
					<input type="text" name="horaInicio" class="form-control input-sm" value="{{$solicitud->horaInicio}}">
				</div>
				<div class="form-group col-md-5">
					<label>Hora fin</label>
					<input type="text" name="horaFin" class="form-control input-sm" value="{{$solicitud->horaFin}}">
				</div>
			</div>
  		</div>

  		<div class="row">
	  		<div class="form-group col-md-11">
	  			<div class="form-group col-md-6">
	  				<label>Carrera</label>
	  				<select name="category_id" class="form-control">
	  					<option selected disabled>{{$solicitud->category->nombre}}</option> <!--DEVUELVE LA CATEGORIA CORRECTA QUE ESTA REGISTRADA EN EN LISTADO-->
	  					@foreach($categorias as $categoria)
	  					<option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
	  					@endforeach
	  				</select>
	  			</div>

	  			<div class="form-group col-md-6">
	  				<label>Laboratorio o area comun</label>
	  				<select name="laboratory_id" class="form-control">
	  					<option selected disabled>{{$solicitud->laboratory->nombre}}</option>
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