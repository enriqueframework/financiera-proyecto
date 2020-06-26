<?php

namespace App\Exports;

use App\Pagos;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class PagoExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    //public function collection()
    //{
      //  return Pagos::all();
    //}

    public function view(): View{
        return view('exports.pagos',[ 
            'pago' => Pagos::all()
        ]);
    }
}