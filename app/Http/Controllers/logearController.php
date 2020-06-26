<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;

use Auth;
use Session;
use App\User;


class logearController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $request = $request->input();
            if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
                return Redirect::to('usuario');
            }else{
                return back()->with('message', 'Correo o Contraseña Incorrecto');
            }
        }
        return view('laravel.login');
    }

    public function formulario()
    {
        return view('laravel.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function crear(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return view('laravel.login')->with('message','Usuario creado');
    }

     public function logout()
    {
        Session::flush();
        return view('laravel.login')->with('flash_message_success','Sesion Finalizada');
    }
}