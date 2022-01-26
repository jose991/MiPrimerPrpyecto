<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Custom login</title>
	<link rel="stylesheet" href="/css/app.css">
</head>
<body>

</body>

	<div class="container">

		<hr>

		@if (session()->has('flash'))
			<div class="alert alert-info">{{ session('flash') }}</div>
		@endif <!--CON ESTA LINEA AGREGADA SE MUESTRA EL MENSAJE EN LA PANTALLA DE LOGIUN AL QUERE INGREESAR AL DASHBOARD SIN ESTAR LOGEADO, EL MENSAJE SE CREO EN App\Exceptions\Handler.php-->

		@yield('content')
		
	</div>
</html>