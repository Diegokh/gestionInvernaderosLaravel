<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invernadero;
use Illuminate\Support\Facades\Auth;

class ControladorInvernadero extends Controller
{

    public function index()
    {
        // Obtengo todos los invernaderos
        $invernaderos = Invernadero::all();
        return view('invernaderos.index', compact('invernaderos'));
    }


    public function create()
    {
        return view('invernaderos.create');
    }


    public function store(Request $request)
    {
        // Valido los campos de  la tabla
        $request->validate([
            'ubicacionInvernadero' => 'required|string|max:255',
            'idUsuario'            => 'required|integer',
        ]);

        // Creo el nuevo invernadero
        Invernadero::create([
            'ubicacionInvernadero' => $request->ubicacionInvernadero,
            'idUsuario'            => $request->idUsuario,
        ]);

        // Vuelvo al index
        return redirect()->route('invernaderos.index')
                         ->with('success', 'Invernadero creado correctamente.');
    }


    public function edit($invernadero)
{
    $invernadero = Invernadero::findOrFail($invernadero);
    return view('invernaderos.edit', compact('invernadero'));
}


    public function update(Request $request, $id_Invernadero)
    {
        $request->validate([
            'ubicacionInvernadero' => 'required|string|max:255',
            'idUsuario'            => 'required|integer',
        ]);


        $invernadero = Invernadero::findOrFail($id_Invernadero);

        // Actualizo los campos
        $invernadero->update([
            'ubicacionInvernadero' => $request->ubicacionInvernadero,
            'idUsuario'            => $request->idUsuario,
        ]);

        return redirect()->route('invernaderos.index')
                         ->with('success', 'Invernadero actualizado correctamente.');
    }

        //Elimino el invernadero
    public function destroy($id_Invernadero)
    {
        Invernadero::destroy($id_Invernadero);

        return redirect()->route('invernaderos.index')
                         ->with('success', 'Invernadero eliminado correctamente.');
    }


    public function misInvernaderos()
    {
        // Obtengo el usuario logeado
        $usuario = Auth::user();

        //Obtenfo los invernaderos relacionados con el usuario
        $invernaderos = Invernadero::where('idUsuario', $usuario->idUsuario)
            ->with([
                // Incluyo los detalles de la alerta en la notificacn
                'notificaciones.alerta',  
                // Incluyo el historial de control
                'historial'  
            ])
            ->get();

        // Verifico si hay invernaderos relacionados con el usuario logeado
        if ($invernaderos->isEmpty()) {
            return response()->json(['message' => 'No tienes invernaderos registrados.'], 404);
        }

       

        
        return response()->json($invernaderos, 200);
    }


    public function dashboard() {
        $datos = Invernadero::getUsuariosPorInvernaderos();

        //dd($datos);

        return view('dashboard', [
            'datos' => $datos
        ]);
    }
}
