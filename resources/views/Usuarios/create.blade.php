@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row ">
		<div class="col-sm-6">

			<h2>Crear nuevo usuario</h2>

			@if($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
	<form action="/usuarios" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}

		<div class="row">
			<div class="form-group col-sm-6">
				<label>Nombre</label>
				<input type="text" class="form-control" name="name" placeholder="Nombre">
			</div>
			<div class="form-group col-sm-5">
				<label>Email</label>
				<input type="text" class="form-control" name="email" placeholder="Email">
			</div>
  		</div>

  		<div class="row">
			<div class="form-group col-md-6">
				<label>Contraseña</label>
				<input type="password" class="form-control" name="password" placeholder="Contraseña">
			</div>
			<div class="form-group col-md-5">
				<label>Confirmar contraseña</label>
				<input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña">
			</div>
  		</div>

  		<div class="row">
			<div class="form-group col-md-6">
				<label>Rol</label>
				<select name="rol" class="form-control">
					<option selected disabled>Elige un rol para este usuario...</option>
					@foreach($roles as $role)

						<option value="{{ $role->id }}">{{ $role->name }}</option>
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
				<button type="reset" class="btn btn-danger">Cancelar</button>
			</div>
  		</div>
	</form>
</div>
@endsection