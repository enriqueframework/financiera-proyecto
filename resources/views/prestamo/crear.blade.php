@extends('cliente.inicio')
@section('contenido')
<div class="row">
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<h3>Nuevo Prestamo</h3>
    		@if (count($errors)>0)
    		<div class="alert alert-danger">
    			<ul>
    			@foreach ($errors->all() as $error)	
    				<li>{{$error}}</li>
    			@endforeach	
    			</ul>
    		</div>
    		@endif
           </div>
       </div> 
       <form action="{{route('prestamo.store')}}" method="POST" enctype="multipart/form-data" id='cliente'>
       @csrf
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="nombre">Cliente</label>
                <select name="idcliente" class="form-control">
                @foreach($cliente as $clientes)
                              <option value="{{$clientes->idcliente}}">{{$clientes->nombre}}</option>
                              @endforeach
                       </select>
                </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Cantidad</label>
                <input type="text" name="cantidad"  value="{{old('cantidad')}}" class="form-control" placeholder="Cantidad">
                </div>  
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="stock">Numero de pago</label>
                <input type="text" name="numero_de_pagos"  value="{{old('numero_de_pagos')}}" class="form-control" placeholder="Numero de pago">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
                <label for="stock">Cuota</label>
                <input type="text" name="cuota" id='direccion' value="{{old('cuota')}}" class="form-control" placeholder="Cuota">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Fecha de Ministracion</label>
                <input type="date" class="form-control" name="fecha_de_ministerio" required value="{{old('fecha_de_ministerio')}}">
                </div>  
                </div>
                
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Fecha de Vencimiento</label>
                <input type="date" class="form-control" name="fecha_de_vencimiento"  value="{{old('fecha_de_vencimiento')}}">
                </div>  
                </div>
           <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
               <button class="btn btn-primary" id='guardar' type="submit">Guardar</button>
           </div> 
    	</div>
    </div>
    </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection