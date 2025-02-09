<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invernadero;

class ControladorInvernadero extends Controller
{
    /**
     * Muestra la lista de invernaderos.
     */
    public function index()
    {
        // Obtenemos todos los invernaderos
        $invernaderos = Invernadero::all();
        // Retornamos la vista con los datos
        return view('invernaderos.index', compact('invernaderos'));
    }

    /**
     * Muestra el formulario para crear un invernadero nuevo.
     */
    public function create()
    {
        return view('invernaderos.create');
    }

    /**
     * Procesa la creación de un invernadero.
     */
    public function store(Request $request)
    {
        // Validamos los campos existentes en la tabla
        $request->validate([
            'ubicacionInvernadero' => 'required|string|max:255',
            'idUsuario'            => 'required|integer',  
        ]);

        // Creamos el invernadero
        Invernadero::create([
            'ubicacionInvernadero' => $request->ubicacionInvernadero,
            'idUsuario'            => $request->idUsuario,
        ]);

        // Redirigimos al index
        return redirect()->route('invernaderos.index')
                         ->with('success', 'Invernadero creado correctamente.');
    }

    /**
     * Muestra el formulario para editar un invernadero existente.
     */
    public function edit($invernadero)
{
    $invernadero = Invernadero::findOrFail($invernadero);
    return view('invernaderos.edit', compact('invernadero'));
}

    /**
     * Procesa la edición de un invernadero.
     */
    public function update(Request $request, $id_Invernadero)
    {
        $request->validate([
            'ubicacionInvernadero' => 'required|string|max:255',
            'idUsuario'            => 'required|integer',
        ]);

        // Cargamos el invernadero existente
        $invernadero = Invernadero::findOrFail($id_Invernadero);

        // Actualizamos con los campos válidos
        $invernadero->update([
            'ubicacionInvernadero' => $request->ubicacionInvernadero,
            'idUsuario'            => $request->idUsuario,
        ]);

        return redirect()->route('invernaderos.index')
                         ->with('success', 'Invernadero actualizado correctamente.');
    }

    /**
     * Elimina un invernadero de la base de datos.
     */
    public function destroy($id_Invernadero)
    {
        Invernadero::destroy($id_Invernadero);

        return redirect()->route('invernaderos.index')
                         ->with('success', 'Invernadero eliminado correctamente.');
    }
}
