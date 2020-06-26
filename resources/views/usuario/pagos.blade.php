@extends('usuario.inicio')
@section('content')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<h3>Pagos <a href="#"><button class="btn btn-success">Descargar</button></a></h3>	
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
					<th>Monto Ministrado</th>
	    			<th>Cuota</th>
					<th>Numeros de Pagos</th>
                    <th>Pagos realizados</th>
                    <th>Saldo abonado</th>
                    <th>Saldo pendiente</th>
	    			<th>Opciones</th>
	    		</thead>
				@foreach($pago as $pagos)
	    		<tr>
	    			<td>{{$pagos->idpagos}}</td>
	    			<td>{{$pagos->cliente->nombre}}</td>
	    			<td>{{$pagos->cantidad}}</td>
	    			<td>{{$pagos->prestamo->cuota}}</td>
					<td>{{$pagos->prestamo->numero_de_pagos}}</td>
                    <td>{{$pagos->numero}}</td>
                    <td>{{$pagos->cantidad_recibida}}</td>
                    <td>{{$pagos->total}}</td>
                    <td>
					<a href="/pago/{{$pagos->idpagos}}/edit"><i class="glyphicon glyphicon-pencil"></i>Actualizar</a>                  
            </td>
	    		</tr>
                @endforeach
				{{$pago->render()}}
	    	</table>
	    </div>
	</div>
</div>
@endsection