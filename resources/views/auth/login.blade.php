@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div align="center">
				<img src="imagenes/utp.jpg" width="180" height="180"><hr>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading" align="center">
					<h1 class="panel-title">Acceso a la aplicacion</h1>
				</div>

				<div class="panel-body">
					<link rel="stylesheet" type="text/css" href="resources/views/admin/estilo.css">
					<form method="POST" action="{{ route('login') }}">
						{{ csrf_field() }}<!--IMPORTAMTE AGREGAR ESTYA LÑIENA DE TOKEN-->

						<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
							<label form="email">Email</label>
							<input class="form-control" type="email" name="email" placeholder="Ingresa tu email"
							value="{{ old('email') }}" aria-describedby="sizing-addon1" required>
							<!--value="{{ old('email') }} ESTA LINEA SIRVE PARA QUE EL EMAIL INGRESADO, EN CASO DE QUE NO EXISTA EN LA BASE DE DATOS, SE QUEDE EN EL CAMPO Y NO SE TENGA QUE ESCRIBIR NUEVAMENTE, TAMBIEN SE AGREGGOP CODIGO AL RESPECTIVO CONTROLADOR (LoginController)-->
							{!! $errors->first('email', '<span class="help-block">:message</span>') !!}<!--PARA MOSTRAR ERRORES EN  EL CAMPO DEL FORMULARIO-->
						</div>

						<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
							<label form="password">Contraseña</label>
							<input class="form-control" type="password" name="password" placeholder="Ingresa tu contraseña" aria-describedby="sizing-addon1" required>
						</div>
						{!! $errors->first('password', '<span class="help-block">:message</span>') !!}<!--PARA MOSTRAR ERRORES EN  EL CAMPO DEL FORMULARIO-->
					</div>
						<button class="btn btn-primary btn-block">Acceder</button>
					</form>
					<a href="{{route('usuarios.create')}}" class="btn btn-link" >Registrarse</a></h2>
				</div>	
			</div>	
		</div>
	</div>


@endsection