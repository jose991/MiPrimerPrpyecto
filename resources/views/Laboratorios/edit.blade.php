@extends('admin.layout') 

@section('content')
<h1>
<h2>Actualizar datos</h2>
</h1>


<div class="container">
	<div class="row ">
		<div class="col-sm-6">

			<h3>Editar laboratorio: {{$laboratorio->nombre}}</h3>
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

	<form action="{{ route('laboratorios.update',$laboratorio->id) }}" method="POST" enctype="multipart/form-data">
		<!--@method('PATCH')--><!--esto lo reemplace con el inout de abajo porque aparecia un mensaje de No Menssage, y con eso se regla y funciona el metodo update correctamente, ES POR EL TOKEN!!!--> <!--este metodo ayuda a actulaizar directamente con el metodo update del controlador-->
		<input name="_method" type="hidden" value="PATCH">
		{{ csrf_field() }}
	  <div class="row">
			<div class="form-group col-sm-6">
				<label>Nombre</label>
				<input type="text" name="nombre" id="nombre" class="form-control" value="{{$laboratorio->nombre}}">
			</div>
			<div class="form-group col-md-6">
				<label>Actividad</label>
				<input type="text" name="actividad" class="form-control" id="actividad" value="{{$laboratorio->actividad}}">
			</div>
			
  		</div>

  		<div class="row">
			<div class="form-group col-md-6">
				<label for="content">Descripcion</label>
				<textarea name="descripcion" class="form-control input-sm" cols="1" rows="5">{{$laboratorio->descripcion}}</textarea>
			</div>
  		</div>

	  	<div class="row">
  			<div class="form-group col-sm-5">
  				<label>Carrera</label>
  				<select name="category_id" class="form-control">
  					<option selected disabled>{{$laboratorio->category->nombre}}</option> <!--DEVUELVE LA CATEGORIA CORRECTA QUE ESTA REGISTRADA EN EN LISTADO-->
  					@foreach($categorias as $categoria)
  					<option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
  					@endforeach
  				</select>
  			</div>

  			<div class="form-group col-md-7">
  				<label>Imagen</label>
  				<input type="file" class="form-control" name="imagen">
  				@if($laboratorio->imagen != "")
	  					<img src="{{ asset('imagenes/' . $laboratorio->imagen)}}" alt="{{ $laboratorio->imagen}}" height="50px" width="50px">
	  				@endif
			</div>
  		</div>





		<div class="row">
			<div class="form-group col-md-6">
				<button type="submit" class="btn btn-primary">Actualizar</button>
				<button href="{{ route('laboratorios.index') }}" class="btn btn-danger">Cancelar</button>
			</div>
  		</div>
	</form>
		</div>
	</div>
</div>
	@endsection