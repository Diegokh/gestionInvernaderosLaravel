<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControladorHistorial extends Controller
{
    public function index()
    {
        // Hacemos el JOIN de historial_control con dispositivos_control 
        // para obtener el "tipo_Dispositivo" junto al historial:
        $historial = DB::table('historial_control as h')
            ->join('dispositivos_control as d', 'h.id_Dispositivo', '=', 'd.id_Dispositivo')
            ->select('h.*', 'd.tipo_Dispositivo')
            ->get();

        // Retornamos la vista con la colección $historial
        return view('historialControl.index', compact('historial'));
    }
}
