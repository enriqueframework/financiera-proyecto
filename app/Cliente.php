<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';
    protected $primaryKey='idcliente';
	public $timestamps=true;

	protected $fillable =[
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'numero_telefono',
        'direccion',
    ];
}
