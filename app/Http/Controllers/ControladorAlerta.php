<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Notificacion;

class ControladorAlerta extends Controller
{
    // Método para listar notificaciones
    public function index()
    {
        $usuario = Auth::user();

        if ($usuario->rolUsuario == 'admin') {
            // Si es admin  obtiene todas las notificaciones
            $notificaciones = Notificacion::with(['alerta', 'usuario', 'invernadero'])->get();
        } else {
            //Si  estándar solo obtiene sus notificaciones
            $notificaciones = Notificacion::where('idUsuario', Auth::id())->with(['alerta', 'usuario', 'invernadero'])->get();
        }

        return view('alertas.index', compact('notificaciones'));
    }


    public function create()
    {
        if (Auth::user()->rolUsuario != 'admin') {
            return redirect()->route('alertas.index')->with('error', 'No tienes permiso para agregar notificaciones.');
        }


        $alertas = DB::table('alertas')->get();
        $usuarios = DB::table('usuarios')->get();
        $invernaderos = DB::table('invernaderos')->get();

        return view('alertas.create', compact('alertas', 'usuarios', 'invernaderos'));
    }


    public function store(Request $request)
    {
        if (Auth::user()->rolUsuario != 'admin') {
            return redirect()->route('alertas.index')->with('error', 'No tienes permiso para agregar notificaciones.');
        }


        $request->validate([
            'idAlerta' => 'required|exists:alertas,idAlerta',
            'idUsuario' => 'required|exists:usuarios,idUsuario',
            'id_Invernadero' => 'required|exists:invernaderos,id_Invernadero',
            'fechaNotificacion' => 'required|date',
            'horaNotificacion' => 'required',
        ]);

        // Insertar la nueva notificación
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
