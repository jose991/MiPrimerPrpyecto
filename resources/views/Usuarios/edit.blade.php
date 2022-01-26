@extends('admin.layout') <!--ESTO ES PARA QUE APARESCA EN EL ADMINLTE-->

@section('content')
<div class="container">
	<div class="row ">
		<div class="col-sm-6">

			<h3>Editar usuario: {{$user->name}}</h3>
			<!--MUESTRA LOS ERRORES EN PANATALLA, ES DECIR, SI ALGUN CAMPO NO ESTA LLENO(escrito)-->
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

	<form action="{{ route('usuarios.update', $user->id) }}" method="POST" enctype="multipart/form-data">
		<!--@method('PATCH')--><!--esto lo reemplace con el inout de abajo porque aparecia un mensaje de No Menssage, y con eso se regla y funciona el metodo update correctamente, ES POR EL TOKEN!!!--> <!--este metodo ayuda a actulaizar directamente con el metodo update del controlador-->
		<input name="_method" type="hidden" value="PATCH">
		{{ csrf_field() }}
	  <div class="row">
			<div class="form-group col-sm-6">
				<label>Nombre</label>
				<input type="text" class="form-control" name="name"  value="{{$user->name}}" placeholder="Nombre">
			</div>
			<div class="form-group col-sm-5">
				<label>Email</label>
				<input type="text" class="form-control" name="email" value="{{$user->email}}" placeholder="Email">
			</div>
  		</div>

  		<div class="row">
			<div class="form-group col-md-6">
				<label>Contraseña <span class="small">(Opcional)</span></label>
				<input type="password" class="form-control" name="password" placeholder="Contraseña">
			</div>
			<div class="form-group col-md-5">
				<label>Confirmar contraseña <span class="small">(Opcional)</span></label>
				<input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña">
			</div>
  		</div>

  		<div class="row">
			<div class="form-group col-md-6">
				<label>Rol</label>
				<select name="rol" class="form-control">
					<option selected disabled>Elige un rol para este usuario...</option>
					@foreach($roles as $role)
						@if($role->name == str_replace(array('["', '"]'), '', $user->tieneRol()))<!--SE ENCARGA DE SELECCIONAR, MOSTRAR EL ROL QUE TIENE EL USUARIO-->
							<option value="{{ $role->id }}" selected>{{ $role->name }}</option>
						@else
							<option value="{{ $role->id }}">{{ $role->name }}</option>
						@endif
					@endforeach
	    		</select>
  			</div>

  			<div class="form-group col-md-5">
  			<label>Imagen</label>
  				<input type="file" class="form-control" name="imagen">
  				@if($user->imagen != "")
  					<img src="{{ asset('imagenes/' . $user->imagen)}}" alt="{{ $user->imagen}}" height="50px" width="50px">
  				@endif
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-6">
				<button type="submit" class="btn btn-primary">Guardar</button>
				<button type="reset" class="btn btn-danger">Cancelar</button>
			</div>
  		</div>
	</form>
		</div>
	</div>
</div>
@endsection
