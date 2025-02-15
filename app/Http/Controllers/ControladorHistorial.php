<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Historial;

class ControladorHistorial extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado
        $usuario = Auth::user();

        // Si el usuario es administrador
        if ($usuario->rolUsuario == 'Administrador') {
            $historial = Historial::with(['dispositivo', 'invernadero'])->get();
        } else {
            // filtro por los invernaderos que le pertenecen
            $historial = Historial::whereHas('invernadero', function ($query) use ($usuario) {
                $query->where('idUsuario', $usuario->idUsuario);
            })
                ->with(['dispositivo', 'invernadero']) 
                ->get();
        }

        return view('historialControl.index', compact('historial'));
    }
}
