<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Prestamo;
use App\Pagos;
use App\Exports\PagoExport;
use App\Imports\ClienteImport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use App\User;

class UsuarioController extends Controller
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

        return view('usuario.inicio', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'numero_telefono' => 'required',
            'direccion' => 'required',
        ]);

        $usuario = new Cliente;
        $usuario->nombre = $request->nombre;
        $usuario->apellido_paterno = $request->apellido_paterno;
        $usuario->apellido_materno = $request->apellido_materno;
        $usuario->numero_telefono = $request->numero_telefono;
        $usuario->direccion = $request->direccion;
        $usuario->save();
        return redirect()->route('usuario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Cliente::find($id);
        return view('usuario.mostrar',compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Cliente::find($id);
        return view('usuario.editar',compact('usuario'));
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
        $usuario = Cliente::find($id);
        $usuario->nombre = $request->nombre;
        $usuario->apellido_paterno = $request->apellido_paterno;
        $usuario->apellido_materno = $request->apellido_materno;
        $usuario->numero_telefono = $request->numero_telefono;
        $usuario->direccion = $request->direccion;
        $usuario->save();
        return redirect()->route('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Cliente::find($id);
        $usuario->delete();
        return redirect("/usuario")->with("OK, se borro un cliente");
    }

    public function nuevo(){
        $bienvenido = Auth::user()->id;
        $usuario = User::select('id')->where('id',$bienvenido)->get()->pluck('id');
        $usuarios = $usuario[0];
        
        $usuarioss = Cliente::all();
        return view('usuario.nuevo', compact('usuarios','usuarioss'));
    }

    public function mostrar($id){
        
        $bienvenido = Auth::user()->id;
        $usuario = User::select('id')->where('id',$bienvenido)->get()->pluck('id');
        $usuarios = $usuario[0];

        $usuario = User::find($id);
        
        return view('usuario.show',compact('usuarios','usuario'));
    }

    public function edito($id)
    {
        $bienvenido = Auth::user()->id;
        $usuario = User::select('id')->where('id',$bienvenido)->get()->pluck('id');
        $usuarios = $usuario[0];

        $usuario = User::find($id);
        return view('usuario.edito',compact('usuarios','usuario'));
    }

    public function actualizar(Request $request, $id){
        if($request->hasFile('fotos')){
            foreach($request->fotos as $foto){
        $usuario = User::find($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
            $usuario->imagen = $foto->store('hola');
            $usuario->save();
            }
        }
        return redirect()->route('usuario.index');
    }

    public function actualizo($id){
        $bienvenido = Auth::user()->id;
        $usuario = User::select('id')->where('id',$bienvenido)->get()->pluck('id');
        $usuarios = $usuario[0];

        $usuario = User::find($id);
        return view('usuario.corregir',compact('usuarios','usuario'));
    }

    public function reno(Request $request, $id){
        $usuario = User::find($id);
        if(isset($request->password)) {$usuario->password = bcrypt($request->password);}
        $usuario->save();
        return redirect()->route('usuario.index');
    }

    public function bash(){
        $saludo = Cliente::all();
        $lista = array();
        foreach($saludo as $key=>$val){
            $lista[$key] = $val;
        }

        $bienvenido = Auth::user()->id;
        $usuario = User::select('id')->where('id',$bienvenido)->get()->pluck('id');
        $usuarios = $usuario[0];

        return view('usuario.bienvenido',compact('val','usuarios'));
    }

    public function importexcel(Request $request){
        $file = $request->file('file');
        Excel::import(new ClienteImport, $file);

        return back()->with('message','Importancio de los clientes');
    }

    public function presta(){
        $bienvenido = Auth::user()->id;
        $usuario = User::select('id')->where('id',$bienvenido)->get()->pluck('id');
        $usuarios = $usuario[0];

        $bienvenido = Prestamo::paginate(10);
        return view('usuario.prestamo',compact('usuarios','bienvenido'));
    }

    public function bienvenido(){
        $bienvenido = Auth::user()->id;
        $usuario = User::select('id')->where('id',$bienvenido)->get()->pluck('id');
        $usuarios = $usuario[0];

        $cliente = Cliente::all();
        return view('usuario.crear-prestamo',compact('usuarios','cliente'));
    }

    public function story(Request $request){
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
}
