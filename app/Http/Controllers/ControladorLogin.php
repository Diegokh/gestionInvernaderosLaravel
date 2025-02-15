<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControladorLogin extends Controller
{
    public function showLoginForm(){
        return view('login');
    }
    public function login(Request $request){
        $credentials = [
            'emailUsuario' => $request->emailUsuario,
            'password' => $request->passwordUsuario,
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('inicio');
        }

        return redirect("login")->withErrors([
            'emailUsuario' => 'Datos incorrectos',
        ])->withInput($request->only('emailUsuario'));
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect("login");
    }

}
