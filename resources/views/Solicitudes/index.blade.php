@extends('admin.layout') 

@section('content')
<div class="container">
  <div class="center">
    <div class="col-md-11">

    <h2>Lista de solicitudes</h2>
    <a href="{{route('solicitudes.create')}}" class="btn btn-info">Realizar solicitud</a>
    @can('administrador')
    <a href="{{ route('descargarPDFSolicitudes')}}" target="_blank" class="btn btn-primary">Imprimir PDF Solicitudes</a>
    @endcan

    {{ csrf_field() }}
      <table class="table table-hover">
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
            <!--<th scope="col">Fecha</th>
            <th scope="col">Hora Inicio</th>
            <th scope="col">Hora fin</th>-->
            @can('administrador')
            <th scope="col" width="100">Opciones</th>
            @endcan
          </tr>
        </thead>
        <tbody>
          @if($solicitudes->count())  <!--PARA QUE FUNCIONE EL DE EDITAR-->
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
              <!--<td scope="row">{{$solicitud->fecha}}</td>
              <td scope="row">{{$solicitud->horaInicio}}</td>
              <td scope="row">{{$solicitud->horaFin}}</td>-->
              @can('administrador')
              <td>
                <a href="{{route('solicitudes.show', $solicitud->id)}}"><button type="button" class="btn btn-secondary btn-sm"><img src="https://img.icons8.com/material-rounded/24/000000/visible.png"/></button></a>

                <a class="btn btn-primary btn-xs" href="{{action('SolicitudController@edit', $solicitud->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a>
              </td>
              @endcan
            </tr>
          @endforeach 
          @endif
        </tbody>
      </table>

    </div>
  </div>
</div>

@endsection