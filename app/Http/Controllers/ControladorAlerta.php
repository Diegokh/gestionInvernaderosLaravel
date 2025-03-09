<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Notificacion;
use App\Models\Invernadero;

class ControladorAlerta extends Controller
{
    // listo las notificaciones
    public function index()
{
    $usuario = Auth::user();

    if ($usuario->rolUsuario == 'Estandar') {
        // Usuario estandar
        $notificaciones = Notificacion::where('idUsuario', $usuario->idUsuario)
                                      ->with(['alerta', 'usuario', 'invernadero'])
                                      ->get();
    } else {
        // Administrador
        $notificaciones = Notificacion::with(['alerta', 'usuario', 'invernadero'])->get();
    }

    return view('alertas.index', compact('notificaciones'));
}


public function create()
{
    if (Auth::user()->rolUsuario != 'Administrador') {
        return redirect()->route('alertas.index')->with('error', 'No tienes permiso para agregar notificaciones.');
    }

    $alertas = \App\Models\Alerta::all();
    $usuarios = \App\Models\Usuario::all();
    $invernaderos = Invernadero::all(); 

    return view('alertas.create', compact('alertas', 'usuarios', 'invernaderos'));
}


    public function store(Request $request)
    {
        if (Auth::user()->rolUsuario != 'Administrador') {
            return redirect()->route('alertas.index')->with('error', 'No tienes permiso para agregar notificaciones.');
        }


        $request->validate([
            'idAlerta' => 'required|exists:alertas,idAlerta',
            'idUsuario' => 'required|exists:usuarios,idUsuario',
            'id_Invernadero' => 'required|exists:invernaderos,id_Invernadero',
            'fechaNotificacion' => 'required|date',
            'horaNotificacion' => 'required',
        ]);

        // Insertar la nueva notificacion
        DB::table('notificacionalertausuario')->insert([
            'idAlerta' => $request->idAlerta,
            'idUsuario' => $request->idUsuario,
            'id_Invernadero' => $request->id_Invernadero,
            'fechaNotificacion' => $request->fechaNotificacion,
            'horaNotificacion' => $request->horaNotificacion,
        ]);

        return redirect()->route('alertas.index')->with('success', 'Notificación creada correctamente.');
    }
}
