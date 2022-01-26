<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reporte de laboratorios</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Tabla de laboratorios</h2>
  <p>El siguiente presenta un listado de los laboratorios registrados</p>            
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Actividad</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Categoria(carrera)</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($laboratorios as $laboratorio)
      <tr>
        <th scope="row">{{$laboratorio->id}}</th>
        <td>{{$laboratorio->nombre}}</td>
        <td>{{$laboratorio->actividad}}</td>
        <td>{{$laboratorio->descripcion}}</td>
        <td scope="row">{{$laboratorio->category->nombre}}</td> 
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>