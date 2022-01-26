@extends('admin.layout') <!--ESTO ES PARA QUE APARESCA EN EL ADMINLTE-->

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container" align="center">
        <div class="center">
            <div class="col-md-10">
                <h1>Solicitud para evento en la Universidad Tecnologica del Poniente</h1> 
            </div>
        </div>
    </div>

    <div class="container" align="center">
      <div class="center">
        <div class="col-sm-10">
          
            <div align="left">
              <h3>El usuario {{$solicitud->user->name}} tiene una solicitud con los siguientes requerimientos.</h3>
              <h3>Datos del laboratorio:</h3>
                <ul>
                  <li>Solicita el laboratorio: {{$solicitud->laboratory->nombre}}</li>
                  <li>Corresponde a la carrera: {{$solicitud->category->nombre}}</li>
                </ul>
              <h3>Datos de solicitud:</h3>
                <ul>
                  <li>Nombre: {{$solicitud->nombreSolicitante}}</li>
                  <li>Carrera del solictante: {{$solicitud->carreraSolicita}}</li>
                  <li>Nombre del evento: {{$solicitud->nombreEvento}}</li>
                  <li>Nombre de la practica: {{$solicitud->nombrePractica}}</li>
                  <li>Fecha de solicitud: {{$solicitud->fecha}}</li>
                  <li>Hora inicio: {{$solicitud->horaInicio}}</li>
                  <li>Hora fin: {{$solicitud->horaFin}}</li>
                </ul>
            
               
            </div>
            
        </div>
      </div>
    </div>
    <div class="container" align="center">
        <div class="center">
            <div class="col-sm-10">
                <form action="{{action('SolicitudController@destroy', $solicitud->id)}}" method="post" align="right">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o fa-lg"></i>Eliminar registro</a></button>
                </form>  
            </div>
        </div>
    </div>
</body>
</html>
@endsection