<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControladorHistorial extends Controller
{
    public function index()
    {
        // Hago el JOIN de historial_control con dispositivos_control
        $historial = DB::table('historial_control as h')
            ->join('dispositivos_control as d', 'h.id_Dispositivo', '=', 'd.id_Dispositivo')
            ->select('h.*', 'd.tipo_Dispositivo')
            ->get();


        return view('historialControl.index', compact('historial'));
    }
}
