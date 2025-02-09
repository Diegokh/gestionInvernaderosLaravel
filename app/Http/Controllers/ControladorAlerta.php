<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControladorAlerta extends Controller
{
    public function index()
    {

        $notificaciones = DB::table('notificacionalertausuario')
        ->join('alertas', 'notificacionalertausuario.idAlerta', '=', 'alertas.idAlerta')
        ->select(
            'notificacionalertausuario.*',
            'alertas.descripcionAlerta'
        )
        ->get();

    return view('alertas.index', compact('notificaciones'));
        
    }

    
}
