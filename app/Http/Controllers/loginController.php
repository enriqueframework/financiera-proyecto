<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;

use Auth;
use Session;

class loginController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $request = $request->input();
            if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
                return Redirect::to('cliente');
            }else{
                return back()->with('message', 'Correo o Contraseña Invalido');
            }
        }
        return view('cliente.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/financiera')->with('flash_message_success','Sesion Finalizada');
    }
}