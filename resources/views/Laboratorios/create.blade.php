@extends('admin.layout') 

@section('content')
<h1>
<h2>Nuevo registro de laboratorio</h2>
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
	<form method="POST" action="{{ route('laboratorios.store') }}" enctype="multipart/form-data">
		{{ csrf_field() }}

		<div class="row">
			<div class="form-group col-sm-6">
				<label>Nombre</label>
				<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del laboratorio o area">
			</div>
			
  		</div>

  		<div class="row">
			<div class="form-group col-md-6">
				<label>Actividad</label>
				<input type="text" name="actividad" id="actividad" class="form-control input-sm" placeholder="Nombre de la actividad que se realiza">
			</div>
  		</div>

  		<!--<div class="row">
  			<div class="form-group col-md-6">
				<label>Descripcion</label>
				<input type="text" name="descripcion" id="descripcion" class="form-control input-sm" placeholder="Descripcion del campo">
			</div>
  		</div>-->

  		<div class="row">
  			<div class="form-group col-md-4">
  				<label for="content">Descripcion</label>
  				<textarea class="form-control" name="descripcion" cols="1" rows="5"></textarea>
  			</div>
  		</div>

  		<div class="row">
  			<div class="form-group col-sm-5">
  				<label>Carrera</label>
  				<select name="category_id" class="form-control">
  					<option selected disabled>Elige la carrera correspondiente...</option>
  					@foreach($categorias as $categoria)
  					<option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
  					@endforeach
  				</select>
  			</div>

  			<div class="form-group col-md-5">
  				<label>Imagen</label>
  				<input type="file" class="form-control" name="imagen">
			</div>
  		</div>

		<div class="row">
			<div class="form-group col-md-6">
				<button type="submit" class="btn btn-primary">Registrar</button>
				<a href="{{ route('laboratorios.index') }}" class="btn btn-danger" >Atrás</a>
			</div>
  		</div>
	</form>
</div>
	
@endsection