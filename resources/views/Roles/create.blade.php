@extends('admin.layout') 

@section('content')
<div class="container">
  <div class="row ">
    <div class="col-sm-4">
  <form action="/roles" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="name">Nombre</label>
      <input type="text" class="form-control" name="name" placeholder="Escribe el nombre del role">
      <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <button type="reset" class="btn btn-danger">Cancelar</button>
  </form>
    </div>
  </div>
</div>


@endsection