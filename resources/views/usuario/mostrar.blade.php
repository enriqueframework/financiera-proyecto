@extends('layouts.app')

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
                    
                    La informacion del cliente
                    <br><br>
                    Nombre: {{$usuario->nombre}}
                    <br>
                    Apellido Paterno: {{$usuario->apellido_paterno}}
                    <br>
                    Apellido Materno: {{$usuario->apellido_materno}}
                    <br>
                    Numero Telefono: {{$usuario->numero_telefono}}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
