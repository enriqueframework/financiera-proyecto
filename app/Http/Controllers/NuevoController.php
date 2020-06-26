<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pagos;
use App\Exports\PagoExport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use App\User;

class NuevoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bienvenido = Auth::user()->id;
        $usuario = User::select('id')->where('id',$bienvenido)->get()->pluck('id');
        $usuarios = $usuario[0];

        $pago = Pagos::paginate(10);
        return view('nuevo.inicio', compact('usuarios','pago'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $bienvenido = Auth::user()->id;
        $usuario = User::select('id')->where('id',$bienvenido)->get()->pluck('id');
        $usuarios = $usuario[0];

        $pago = Pagos::find($id);
        return view('nuevo.vista',compact('usuarios','pago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pago = Pagos::find($id);
        $pago->numero = $request->numero;
        $pago->fecha_de_pago = $request->fecha_de_pago;
        $pago->cantidad_recibida = $request->cantidad_recibida;
        
        $hola = $pago->cantidad_recibida;
        $nuevo = $pago->cantidad;
        $mundo = $nuevo-$hola;

        $pago->total = $mundo;
        $pago->save();
        return redirect()->route('nuevo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function exportExcel(){
        return Excel::download(new PagoExport, 'pagos-list.xlsx');
    }
}
