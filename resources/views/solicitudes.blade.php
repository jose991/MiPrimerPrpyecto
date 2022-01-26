<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reporte de solicitudes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Tabla de solicitudes</h2>
  <p>El siguiente presenta un listado de las solicitudes realizadas</p>            
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre solicitante</th>
        <th scope="col">Usuario(logeado)</th>
        <th scope="col">Carrera(categoria)</th>
        <th scope="col">Laboratorio(areas)</th>
        <th scope="col">Carrera solicitante</th>
        <th scope="col">Nombre evento</th>
        <th scope="col">Nombre practica</th>
        <th scope="col">Fecha</th>
        <th scope="col">Hora Inicio</th>
        <th scope="col">Hora fin</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($solicitudes as $solicitud)
      <tr>
      	<th scope="row">{{$solicitud->id}}</th>
        <td scope="row">{{$solicitud->nombreSolicitante}}</td>
        <td scope="row">{{$solicitud->user->name}}</td> <!--MUESTRA AL USUARIO QUE HIZO LA SOLITUD, ESTE TIENE RELACION UNO A MUCHOS ENTRE SOLITUD Y USUARIO-->
        <td scope="row">{{$solicitud->category->nombre}}</td>
        <td scope="row">{{$solicitud->laboratory->nombre}}</td>
        <td scope="row">{{$solicitud->carreraSolicita}}</td>
        <td scope="row">{{$solicitud->nombreEvento}}</td>
        <td scope="row">{{$solicitud->nombrePractica}}</td>
        <td scope="row">{{$solicitud->fecha}}</td>
        <td scope="row">{{$solicitud->horaInicio}}</td>
        <td scope="row">{{$solicitud->horaFin}}</td> 
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>