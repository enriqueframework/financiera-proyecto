@extends('cliente.inicio')
@section('contenido')
<div class="row">
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<h3>Nuevo Cliente</h3>
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
       <form action="{{route('cliente.validar',$cliente->idcliente)}}" method="POST" enctype="multipart/form-data">
       @csrf
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" required value="{{$cliente->nombre}}" class="form-control" placeholder="Nombre...">
                </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Apellido Paterno</label>
                <input type="text" name="apellido_paterno" required value="{{$cliente->apellido_paterno}}" class="form-control" placeholder="Apellido Paterno">
                </div>  
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="stock">Apellido Materno</label>
                <input type="text" name="apellido_materno" required value="{{$cliente->apellido_materno}}" class="form-control" placeholder="Apellido Materno">
                </div>
            </div>
             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
                <label for="stock">Numero Telefono</label>
                <input type="text" name="numero_telefono" required value="{{$cliente->numero_telefono}}" class="form-control" placeholder="Numero Telefono">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
                <label for="stock">Dirección</label>
                <input type="text" name="direccion" required value="{{$cliente->direccion}}" class="form-control" placeholder="Direccion">
                </div>
            </div>
           <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
               <button class="btn btn-primary" type="submit">Guardar</button>
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