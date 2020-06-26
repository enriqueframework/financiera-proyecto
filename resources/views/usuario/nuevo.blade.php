@extends('usuario.inicio')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<h3>Clientes Nuevo <a href="{{route('usuario.create')}}"><button class="btn btn-success">Nuevo</button></a></h3>	
	</div>

    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<form action="{{route('usuario.excel')}}" method="post" enctype="multipart/form-data">
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
              @foreach($usuarioss as $usuario)
	    		<tr>
	    			<td>{{$usuario->idcliente}}</td>
	    			<td>{{$usuario->nombre}}</td>
	    			<td>{{$usuario->apellido_paterno}}</td>
	    			<td>{{$usuario->apellido_materno}}</td>
					<td>{{$usuario->numero_telefono}}</td>
                    <td><a href="/usuario/{{$usuario->idcliente}}">SHOW</a> 
                <a href="/usuario/{{$usuario->idcliente}}/edit">UPDATE</a>

				  <form action="/usuario/{{$usuario->idcliente}}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="DELETE">
                    </form>                
            </td>
	    		</tr>
                @endforeach
	    	</table>
	    </div>
	</div>
</div> 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection