<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Auth;
use App\User;
use Illuminate\Support\Facades\Input;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ClienteImport;

class ClienteController extends Controller
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
        
        return view('cliente.inicio',compact('usuarios'));
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
        $bienvenido = Auth::user()->id;
        $usuario = User::select('id')->where('id',$bienvenido)->get()->pluck('id');
        $usuarios = $usuario[0];

        $usuario = User::find($id);
        return view('cliente.show',compact('usuarios','usuario'));
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

        $cliente = Cliente::find($id);
        return view('cliente.edit',compact('cliente','usuarios'));
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
        if($request->hasFile('fotos')){
            foreach($request->fotos as $foto){
        $usuario = User::find($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
            $usuario->imagen = $foto->store('hola');
            $usuario->save();
            }
        }
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect("/cliente")->with("Se eliminado a un cliente");
    }

    public function bashoard(){
        $saludo = Cliente::all();
        $lista = array();
        foreach($saludo as $key=>$val){
            $lista[$key] = $val;
        }

        $bienvenido = Auth::user()->id;
        $usuario = User::select('id')->where('id',$bienvenido)->get()->pluck('id');
        $usuarios = $usuario[0];

        return view('cliente.bienvenido',compact('val','usuarios'));
    }

    public function editar($id){
        $bienvenido = Auth::user()->id;
        $usuario = User::select('id')->where('id',$bienvenido)->get()->pluck('id');
        $usuarios = $usuario[0];

        $usuario = User::find($id);
        return view('cliente.editar',compact('usuarios','usuario'));
    }

    public function actualizar($id){
        
        $bienvenido = Auth::user()->id;
        $usuario = User::select('id')->where('id',$bienvenido)->get()->pluck('id');
        $usuarios = $usuario[0];

        $usuario = User::find($id);
        return view('cliente.corregir',compact('usuarios','usuario'));
    }

    public function renovar(Request $request, $id){
        $usuario = User::find($id);
        if(isset($request->password)) {$usuario->password = bcrypt($request->password);}
        $usuario->save();
        return redirect()->route('cliente.index');
    }
    
    public function inicio(){
        $bienvenido = Auth::user()->id;
        $usuario = User::select('id')->where('id',$bienvenido)->get()->pluck('id');
        $usuarios = $usuario[0];

        $cliente = Cliente::paginate(10);

        return view('cliente.principal',compact('usuarios','cliente'));
    }

    public function ver(){
        $bienvenido = Auth::user()->id;
        $usuario = User::select('id')->where('id',$bienvenido)->get()->pluck('id');
        $usuarios = $usuario[0];
        
        return view('cliente.crear',compact('usuarios'));
    }

    public function crear(Request $request){
        $request->validate([
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'numero_telefono' => 'required',
            'direccion' => 'required',
        ]);

        $cliente = new Cliente;
        $cliente->nombre = $request->nombre;
        $cliente->apellido_paterno = $request->apellido_paterno;
        $cliente->apellido_materno = $request->apellido_materno;
        $cliente->numero_telefono = $request->numero_telefono;
        $cliente->direccion = $request->direccion;
        $cliente->save();
        return redirect()->route('cliente.index');
    }

    public function validar(Request $request, $id){
        $cliente = Cliente::find($id);
        $cliente->nombre = $request->nombre;
        $cliente->apellido_paterno = $request->apellido_paterno;
        $cliente->apellido_materno = $request->apellido_materno;
        $cliente->numero_telefono = $request->numero_telefono;
        $cliente->direccion = $request->direccion;
        $cliente->save();
        return redirect()->route('cliente.index');
    }

    public function importexcel(Request $request){
        $file = $request->file('file');
        Excel::import(new ClienteImport, $file);

        return back()->with('message','Importancio de los clientes');
    }
}