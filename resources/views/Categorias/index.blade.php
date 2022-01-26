@extends('admin.layout')

@section('content')
<div class="container">
	<div class="center">
		<div class="col-md-4">
			<h2>Listado de Carreras <a href="{{ route('categorias.create') }}" class="btn btn-info">Agregar Carrera</a></h2>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Nombre</th>
					</tr>
				</thead>

				<tbody>
					@foreach($categorias as $categoria)
					<tr>
						<th scope="row">{{ $categoria->id}}</th>
						<th>{{ $categoria->nombre}}</th>
					</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
	</div>
</div>

@endsection