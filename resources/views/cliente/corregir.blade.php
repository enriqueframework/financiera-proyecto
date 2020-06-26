@extends('cliente.inicio')
@section('contenido')
<div class="container">
      <div class="py-3 text-center">
        <br><br>
        <h1>Cambiar la contraseña</h1>
      </div>
          <form action="{{route('cliente.renovar',$usuario->id)}}" method="POST">
          @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="Contraseña" required value="">
              </div>
              <br>
            <button class="btn btn-primary" type="submit">Guardar</button>
          </form>
        </div>
@endsection