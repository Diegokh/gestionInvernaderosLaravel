<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ControladorUsuario extends Controller
{
   //Listo los usuarios
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    //Formulario de creacion
    public function create()
    {
        return view('usuarios.create');
    }

    //Nuevo usuario
    public function store(Request $request)
    {
        // Valido los campos
        $request->validate([
            'nombreUsuario'   => 'required|string|max:255',
            'apellidoUsuario' => 'required|string|max:255',
            'emailUsuario'    => 'required|email|unique:usuarios,emailUsuario',
            'passwordUsuario' => 'required|string|min:8',
            'telefonoUsuario' => 'required|string|max:255',
            'rolUsuario'      => 'required|string|max:50',
        ]);



        Usuario::create([
            'nombreUsuario'   => $request->nombreUsuario,
            'apellidoUsuario' => $request->apellidoUsuario,
            'emailUsuario'    => $request->emailUsuario,
            'passwordUsuario' => Hash::make($request->passwordUsuario),
            'telefonoUsuario' => $request->telefonoUsuario,
            'rolUsuario'      => $request->rolUsuario
        ]);


        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuario creado correctamente.');
    }


    public function edit($idUsuario)
    {

        $usuario = Usuario::findOrFail($idUsuario);
        return view('usuarios.edit', compact('usuario'));
    }


    public function update(Request $request, $idUsuario)
    {
        // Valido los datos
        $request->validate([
            'nombreUsuario'   => 'required|string|max:255',
            'apellidoUsuario' => 'required|string|max:255',
            'emailUsuario'    => 'required|email|unique:usuarios,emailUsuario,' . $idUsuario . ',idUsuario',
            'passwordUsuario' => 'nullable|string|min:8',
            'telefonoUsuario' => 'required|string|max:255',
            'rolUsuario'      => 'required|string|max:50',
        ]);


        $usuario = Usuario::findOrFail($idUsuario);

        // Asigno los campos
        $usuario->nombreUsuario   = $request->nombreUsuario;
        $usuario->apellidoUsuario = $request->apellidoUsuario;
        $usuario->emailUsuario    = $request->emailUsuario;
        if ($request->passwordUsuario) {
            $usuario->passwordUsuario = Hash::make($request->passwordUsuario);
        }
        $usuario->telefonoUsuario = $request->telefonoUsuario;
        $usuario->rolUsuario      = $request->rolUsuario;

        // Guardo los cambios
        $usuario->save();

        // Redirige al index
        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuario actualizado correctamente.');
    }

    //ConsultaJson
    public function usuarioConInvernadero(){
        if(Auth::user()->rolUsuario != 'Administrador'){
            return response('Acceso denegado', 403);
        }

        //Obtengo la consulta JSON
        $usuarios = Usuario::with('invernaderos')->get();
        return response($usuarios, 200);
    }



   //Elimino el usuario
    public function destroy($idUsuario)
    {
        Usuario::destroy($idUsuario);
        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuario eliminado correctamente.');
    }
}
