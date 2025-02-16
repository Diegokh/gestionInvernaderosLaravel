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
        // Obtengo el usuario
        $usuario = Auth::user();


        if ($usuario->rolUsuario == 'Administrador') {
            $historial = Historial::with(['dispositivo', 'invernadero'])->get();
        } else {
            $historial = Historial::whereHas('invernadero', function ($query) use ($usuario) {
                $query->where('idUsuario', $usuario->idUsuario);
            })
                ->with(['dispositivo', 'invernadero'])
                ->get();
        }

        return view('historialControl.index', compact('historial'));
    }

    public function destroy($id)
    {
        $usuario = Auth::user();
        $historial = Historial::findOrFail($id);


        if ($usuario->rol == 'estandar') {
            $historial->delete();
            return redirect()->route('historialControl.index')->with('success', 'Registro eliminado correctamente.');
        }

        return redirect()->route('historialControl.index')->with('error', 'No tienes permiso para eliminar este registro.');
    }
}
