<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    
    protected $table='pagos';
    protected $primaryKey='idpagos';
	public $timestamps=true;

	protected $fillable =[
        'idcliente',
        'idprestamos',
        'numero',
        'cantidad',
        'fecha_de_pago',
        'cantidad_recibida',
        'total'
    ];

    public function cliente(){
        return $this->belongsTo("App\Cliente","idcliente","idcliente");
    }

    public function prestamo(){
        return $this->belongsTo("App\Prestamo","idprestamos","idprestamos");
    }
}
