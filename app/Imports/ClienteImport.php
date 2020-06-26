<?php

namespace App\Imports;

use App\Cliente;
use Maatwebsite\Excel\Concerns\ToModel;

class ClienteImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Cliente([
            'idcliente' => $row[0],
            'nombre' => $row[1],
            'apellido_paterno' => $row[2],
            'apellido_materno' => $row[3],
        ]);
    }
}