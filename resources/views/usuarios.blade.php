<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>TABLA USUARIOS</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<header>
		<p><strong>PDF DE USUARIOS CON LARAVEL</strong></p>
	</header>
	<div class="container">
		<h5 style="text-align: center;">TABLA DE USUARIOS</h5>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">ID</th>
				    <th scope="col">Nombre</th>
				    <th scope="col">Gmail</th>
				    <th scope="col">Role</th>
				    
				 </tr>
			</thead>
			<tbody>
				@foreach($usuarios as $usuario)
				<tr>
					<th scope="row">{{$usuario->id}}</th>
				    <td>{{$usuario->name}}</td>
				    <td>{{$usuario->email}}</td>
				    <td>
				    	@foreach($usuario->roles as $role)
				    		{{ $role->name }}
				    	@endforeach 
				    </td>
				    
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>