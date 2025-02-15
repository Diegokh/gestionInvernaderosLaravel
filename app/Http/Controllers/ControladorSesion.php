<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class ControladorSesion extends Controller
{
    function index() {
        return view('inicioSesion.index');
    }

    function store(){
        $validacion = request()->validate([
            'emailUsuario'=>'required|email',
            'passwordUsuario'=>'required'
        ]);

        if Auth::attempt($validacion){
            return redirect('inicio');
        }else{

        }
    }

    function destroy(){
        Auth::logout();
        return redirect('/');
    }


}
