@extends('admin.layout') <!--ESTO ES PARA QUE APARESCA EN EL ADMINLTE-->

@section('content')
<div class="container">

  <hr> <!--SALTO!!IGUAL QUE EL BR, BUENO CASI, O NOSE PERO DEJA UN ESPACIO-->
  <!--BUSCADOR-->
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <form class="sidebar-form">
          <div class="input-group">
          <input class="form-control form-control-navbar" type="search" name="search" placeholder="Ingresa tu busqueda" aria-label="Search"/>
          <span class="input-group-btn">
            <button type="submit" id='search-btn' class="btn btn-navbar"><i class="fa fa-search"></i></button>
          </span>
          </div>
        </form>
      </div>
    </div>
  </div>
    <!--FIN CODIGO BUSCCADOR, HAY CODIGO TAMBIEN EN EL CONTROLADOR-->

    <!--<h2>Lista de usuarios <a href="{{route('usuarios.create')}}" class="btn btn-info" >Añadir</a></h2>-->
    <h2>Lista de usuarios</h2>
    @can('administrador')
    <a href="{{ route('descargarPDFUsuarios') }}" target="_blank" class="btn btn-sm btn-primary">ImprimirPDFUsuarios</a>
    <!--EL target="_blank" HACE QUE SE ABRA OTRA PESTAÑA PARA EL PDF, SI SE QUITA PUES EN LA MISMA PAGINA SE ABRIRA EL PDF-->
    @endcan
    <h6>
      @if($search)
      <div class="alert alert-primary" role="alert">
        Los resultados para tu busqueda '{{$search}}' son:
      </div>
      @endif
    </h6>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Imagen</th>
        @can('administrador')
        <th scope="col">Opciones</th>
        @endcan
      </tr>
    </thead>
    <tbody>
      @foreach($usuarios as $usuario)
        <tr>
          <th scope="row">{{$usuario->id}}</th>
          <td>{{$usuario->name}}</td>
          <td>{{$usuario->email}}</td>
          <!--aca se recorre todos los roles, recordando que la relacion es de muchos a muhcos!en fin, tiene que mostrara el rol registrado por cada usuario-->
          <td>
            @foreach($usuario->roles as $role)
              {{ $role->name }}
           @endforeach 
          </td>
          <!--PARA QUE SE MUESTRE LA IMAGEN SEGUN E USUARIO-->  
          <td>
            <img src="{{ asset('imagenes/' . $usuario->imagen)}}" alt="{{ $usuario->imagen}}" height="50px" width="50px" class="img-circle">
          </td>

          @can('administrador')
          <td>
            <a href="{{route('usuarios.show', $usuario->id)}}"><button type="button" class="btn btn-secondary btn-sm"><img src="https://img.icons8.com/material-rounded/24/000000/visible.png"/></button></a>
            
            <a class="btn btn-primary btn-xs" href="{{action('UsuarioController@edit', $usuario->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a>
          </td>
          @endcan
        </tr>
      @endforeach 
    </tbody>
  </table>

  <div class="text-center">
    <div class="mx-auto">
      {{$usuarios->links()}} <!--CON ESTA LINEA DE CODIGO, APARECERA EL NUMERO DE PAGINACION, OJO!SOLO CON ESTA ENTRE PARENTESIS, lo del DIV ayuda a que se centre en la pagina-->
    </div>
  </div>
</div>
@endsection