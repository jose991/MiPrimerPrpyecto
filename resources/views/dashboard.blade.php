@extends('admin.layout')

@section('content')


	<h1 align="center">Bienvenido</h1>

@endsection

<!--ESTO SE CAMBIO POR LO DE ARRIBA, PARA QUE CUANDO INICIE SESION, ETNONCES APARESCA LA PANATALLA DE ADMINLTE Y NO ESTE QUE ESTABA ANTES-->
<!--
<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title">Bienvenido {{ auth()->user()->name }}</h1>
			</div>

			<div class="panel-body">
				<form method="POST" action="{{ route('logout') }}">
					{{ csrf_field() }}
					<button class="btn btn-danger btn-xs btn-block">Cerrar sesión</button>
				</form>
				
			</div>
		</div>
	</div>
--->
