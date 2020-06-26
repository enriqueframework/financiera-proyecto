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
       <form action="{{route('cliente.crear')}}" method="POST" enctype="multipart/form-data" id='cliente'>
       @csrf
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id='nombre' name="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
                </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="codigo">Apellido Paterno</label>
                <input type="text" id='apellido_paterno' name="apellido_paterno"  value="{{old('apellido_paterno')}}" class="form-control" placeholder="Apellido Paterno">
                </div>  
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label for="stock">Apellido Materno</label>
                <input type="text" id='apellido_materno' name="apellido_materno"  value="{{old('apellido_materno')}}" class="form-control" placeholder="Apellido Materno">
                </div>
            </div>
             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
                <label for="stock">Numero Telefono</label>
                <input type="text" id='numero_telefono' name="numero_telefono"  value="{{old('numero_telefono')}}" class="form-control" placeholder="Numero Telefono">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
                <label for="stock">Dirección</label>
                <input type="text" name="direccion" id='direccion' value="{{old('direccion')}}" class="form-control" placeholder="Direccion">
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

<script type="text/javascript">

$('#cliente').click(function(event){
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: "{{ route('cliente.crear') }}",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        beforeSend: function(){
        },
        success: function(msg){
          alert(msg.mensaje);
          getCliente();
        }
    });
});
</script>
@endsection