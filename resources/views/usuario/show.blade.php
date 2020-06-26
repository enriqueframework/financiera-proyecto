@extends('usuario.inicio')
@section('content')
<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad" >

          <div class="panel panel-success"><br>
              <h2 class="panel-title"><center><font size="5"></i>PERFIL</font></center></h2>

            <div class="panel-body">
              <div class="row">
			  
                <div class="col-md-3 col-lg-3 " align="center"> 
				<div id="load_img">
					<img class="img-responsive" src="{{asset($usuario->imagen)}}" height="150px" width="150px">
				</div>
				<br>				
					<div class="row">
  						<div class="col-md-12">
						</div>
						
					</div>
				</div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <td class='col-md-3'>Nombre(S):</td>
                        <td><input type="text" name="name" value="{{$usuario->name}}" required readonly></td>
                      </tr>
                      <tr>
                      	<tr>
                        <td class='col-md-3'>Email</td>
                        <td><input type="text" name="email" value="{{$usuario->email}}" required readonly></td>
                      </tr>
                      <td>
                    <a href="{{route('usuario.edito',$usuario)}}"><button class="btn btn-primary">Editar</button></a>
                     </td>
                     
                    </tbody>
                  </table>
@endsection