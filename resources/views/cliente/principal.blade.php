@extends('cliente.inicio')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<h3>Clientes <a href="{{route('cliente.ver')}}"><button class="btn btn-success">Nuevo Cliente</button></a></h3>	
	</div>
</div>

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">
	<form action="{{route('cliente.import.excel')}}" method="post" enctype="multipart/form-data">
	  @csrf
	  <input type="file" name="file">

	  <button class="btn btn-primary">Importar Clientes</button>
	</form>	
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="table-responsive">
		   <br>
	    	<table class="table table-striped table-bordered table-condensed table-hover">
	    		<thead>
	    			<th>No</th>
	    			<th>Nombre</th>
					<th>Apellido_paterno</th>
	    			<th>Apellido_materno</th>
					<th>Numero Telefono</th>
	    			<th>Opciones</th>
	    		</thead>
              @foreach($cliente as $clientes)
	    		<tr>
	    			<td>{{$clientes->idcliente}}</td>
	    			<td>{{$clientes->nombre}}</td>
	    			<td>{{$clientes->apellido_paterno}}</td>
	    			<td>{{$clientes->apellido_materno}}</td>
					<td>{{$clientes->numero_telefono}}</td>
                    <td>
					<a href="/cliente/{{$clientes->idcliente}}/edit"><i class="glyphicon glyphicon-pencil"></i></a> 
				  <form action="/cliente/{{$clientes->idcliente}}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="DELETE" class="btn btn-link">
                    </form>                 
            </td>
	    		</tr>
                @endforeach
				{{$cliente->render()}}
	    	</table>
	    </div>
	</div>
</div>
@endsection