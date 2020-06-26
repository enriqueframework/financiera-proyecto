<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Prestamo;
use App\Cliente;
use Carbon\Carbon;
use App\Pagos;

class PrestamoController extends Controller
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

        $bienvenido = Prestamo::paginate(10);
        return view('prestamo.inicio',compact('usuarios','bienvenido'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bienvenido = Auth::user()->id;
        $usuario = User::select('id')->where('id',$bienvenido)->get()->pluck('id');
        $usuarios = $usuario[0];

        $cliente = Cliente::all();
        return view('prestamo.crear',compact('usuarios','cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{ 

        $prestamo = new Prestamo;
        $prestamo->idcliente = $request->idcliente;
        $prestamo->cantidad = $request->cantidad;
        $prestamo->numero_de_pagos = $request->numero_de_pagos;
        $prestamo->cuota = $request->cuota;
        $prestamo->fecha_de_ministerio = $request->fecha_de_ministerio;
        $prestamo->fecha_de_vencimiento=$request->fecha_de_vencimiento;
        $prestamo->save();

        $hola = $prestamo->cantidad;
        $bienvenido = $hola * '0.32';
        $bueno = $hola + $bienvenido;
        
            $linea = new Pagos;
            $linea->idcliente=$prestamo->idcliente;
            $linea->cantidad = $bueno;
            $linea->idprestamos=$prestamo->idprestamos;
            $linea->save();
           
            DB::commit();
           return back();
       }
       catch(Exception $e){
        DB::rollBack();
        return redirect("/prestamos")->with('ok','ERROR');
       }
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
        //
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
        //
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
}
