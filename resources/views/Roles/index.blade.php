@extends('admin.layout') 

@section('content')
<div class="container">
  <div class="center">
    <div class="col-md-4">

    <h2>Roles de usuario <a href="{{route('roles.create')}}" class="btn btn-info">Agregar role</a></h2>
    {{ csrf_field() }}
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
          </tr>
        </thead>
        <tbody>

          @foreach($roles as $role)
            <tr>
              <th scope="row">{{$role->id}}</th>
              <td>{{$role->name}}</td>
            </tr>
          @endforeach 
        </tbody>
      </table>

    </div>
  </div>
</div>

@endsection