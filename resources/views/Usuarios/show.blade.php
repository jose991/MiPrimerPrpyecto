@extends('admin.layout') <!--ESTO ES PARA QUE APARESCA EN EL ADMINLTE-->

@section('content')
<body>
    <div class="container" align="center">
        <div class="center">
            <div class="col-md-10">
                <h2>
                    <img src="{{ asset('imagenes/' . $user->imagen)}}" alt="{{ $user->imagen}}" align="absmiddle" height="150" width="150" class="img-thumbnail">{{$user->name}}
                </h2>
                <h3>Es usuario parte de la Universidad Tecnologica del Poniente</h3> 
            </div>
        </div>
    </div>

    <div class="container" align="center">
      <div class="center">
        <div class="col-sm-10">
            <div class="col-md-4">
                <h3>Email</h3>
                <p>{{$user->email}}</p>
            </div>
            <div class="col-sm-4">
              <h3>Role</h3>
              <p>@foreach($user->roles as $role)
                {{$role->name}}
                @endforeach
                </p>
            </div>
            
        </div>
      </div>
    </div>
    <div class="container" align="center">
        <div class="center">
            <div class="col-sm-10">
                <form action="{{action('UsuarioController@destroy', $user->id)}}" method="post" align="right">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o fa-lg"></i>Eliminar usuario</a></button>
                </form>  
            </div>
        </div>
    </div>
</body>
@endsection