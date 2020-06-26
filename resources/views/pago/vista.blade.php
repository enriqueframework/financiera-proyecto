@extends('cliente.inicio')
@section('contenido')
<div class="row">
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<h3>Abonos</h3>
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
       <form action="{{route('pago.update',$pago->idpagos)}}" method="POST" enctype="multipart/form-data">
       @csrf
       @method('PUT')
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="nombre">Numero de Pago</label>
                <input type="text" name="numero" required value="{{$pago->numero}}" class="form-control" placeholder="Numero de Pago..">
                </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Saldo Abonado</label>
                <input type="text" name="cantidad_recibida" required value="{{$pago->cantidad_recibida}}" class="form-control" placeholder="Saldo Abonado">
                </div>  
                </div>
                
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Fecha de Pago</label>
                <input type="date" class="form-control" name="fecha_de_pago" required value="{{old('fecha_de_pago')}}">
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