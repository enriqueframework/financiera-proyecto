@extends('usuario.inicio')
@section('content')
<textarea id="w3review" name="w3review" rows="6" cols="50" readonly>
{{$val->idcliente}}
Numero de Cliente
  </textarea>
@endsection