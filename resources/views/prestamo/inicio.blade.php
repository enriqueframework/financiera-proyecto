@extends('cliente.inicio')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<h3>Prestamos <a href="{{route('prestamo.create')}}"><button class="btn btn-success">Nuevo Prestamo</button></a></h3>	
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
					<th>Cantidad</th>
	    			<th>Número de pagos</th>
					<th>Cuota</th>
                    <th>Fecha de Ministración</th>
                    <th>Fecha de Vencimiento</th>
	    			<th>Opciones</th>
	    		</thead>
              @foreach($bienvenido as $bienvenidos)
	    		<tr>
	    			<td>{{$bienvenidos->idprestamos}}</td>
	    			<td>{{$bienvenidos->cliente->nombre}}</td>
	    			<td>{{$bienvenidos->cantidad}}</td>
	    			<td>{{$bienvenidos->numero_de_pagos}}</td>
					<td>{{$bienvenidos->cuota}}</td>
                    <td>{{$bienvenidos->fecha_de_ministerio}}</td>
                    <td>{{$bienvenidos->fecha_de_vencimiento}}</td>
                    <td>
					<a href="#"><i class="glyphicon glyphicon-pencil"></i></a> 
				  <form action="#" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="DELETE" class="btn btn-link">
                    </form>                 
            </td>
	    		</tr>
                @endforeach
				{{$bienvenido->render()}}
	    	</table>
	    </div>
	</div>
</div>
@endsection