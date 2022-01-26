@extends('admin.layout') <!--ESTO ES PARA QUE APARESCA EN EL ADMINLTE-->

@section('content')
<div class="container">
  <div class="center">
    <div class="col-md-11">

      <hr> <!--SALTO!!IGUAL QUE EL BR, BUENO CASI, O NOSE PERO DEJA UN ESPACIO-->

        <h2>Lista de laboratorios </h2>
        @can('administrador')
        <a href="{{route('laboratorios.create')}}" class="btn btn-info">Agregar laboratorio</a>
        <a href="{{ route('descargarPDFLaboratorios')}}" target="_blank" class="btn btn-primary">Imprimir PDF Laboratorios</a>
        @endcan

      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Actividad</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Categoria(carrera)</th>
            <th scope="col">Imagen</th>
            @can('administrador')
            <th scope="col" width="100">Opciones</th>
            @endcan
          </tr>
        </thead>
        <tbody>
          @if($laboratorios->count())  
          @foreach($laboratorios as $laboratorio)
            <tr>
              <th scope="row">{{$laboratorio->id}}</th>
              <td>{{$laboratorio->nombre}}</td>
              <td width="200" height="50">{{$laboratorio->actividad}}</td>
              <td width="300" height="50">{{$laboratorio->descripcion}}</td>
              <td scope="row">{{$laboratorio->category->nombre}}</td>

              <td>
                <img src="{{ asset('imagenes/' . $laboratorio->imagen)}}" alt="{{ $laboratorio->imagen}}" height="50px" width="50px">
              </td>

              @can('administrador')
              <td>
                <a href="{{route('laboratorios.show', $laboratorio->id)}}"><button type="button" class="btn btn-secondary btn-sm"><img src="https://img.icons8.com/material-rounded/24/000000/visible.png"/></button></a>

                <a class="btn btn-primary btn-xs" href="{{action('LaboratorioController@edit', $laboratorio->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a>
              </td>
              @endcan
            </tr>
          @endforeach 
          @else
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection