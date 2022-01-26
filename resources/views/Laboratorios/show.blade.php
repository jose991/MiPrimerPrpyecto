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
                <h2>
                    <img src="{{ asset('imagenes/' . $laboratorio->imagen)}}" alt="{{ $laboratorio->imagen}}" align="absmiddle" height="100" width="100">{{$laboratorio->nombre}}
                </h2>
                <h3>Area de la Universidad Tecnologica del Poniente</h3> 
            </div>
        </div>
    </div>

    <div class="container" align="center">
      <div class="center">
        <div class="col-sm-10">
            <div class="col-md-4">
                <h3>Actividad</h3>
                <p>{{$laboratorio->actividad}}}</p>
            </div>
            <div class="col-sm-4">
              <h3>Descripcion</h3>
              <p>{{$laboratorio->descripcion}}</p>
            </div>
            <div class="col-sm-3">
              <h3>Carrera a la que pertenece</h3>        
              <p>{{$laboratorio->category->nombre}}</p>
            </div>
        </div>
      </div>
    </div>
    <div class="container" align="center">
        <div class="center">
            <div class="col-sm-10">
                <form action="{{action('LaboratorioController@destroy', $laboratorio->id)}}" method="post" align="right">
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