<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    
    protected $table='prestamos';
    protected $primaryKey='idprestamos';
	public $timestamps=true;

	protected $fillable =[
        'idcliente',
        'cantidad',
        'numero_de_pagos',
        'cuota',
        'fecha_de_ministerio',
        'fecha_de_vencimiento',
    ];

    public function cliente(){
        return $this->belongsTo("App\Cliente","idcliente","idcliente");
    }
}
