<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    public function show($id)
    {
        $usuario = Usuario::find($id);
        if ($usuario) {
            return response()->json($usuario);
        }
        return response()->json(['error' => 'Usuario no encontrado'], 404);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom_usuario' => 'required|string|max:100',
            'correo' => 'required|string|email|max:100',
            'contraseña' => 'required|string|min:6',
            'rol' => 'required|string|max:50'
        ]);

        $usuario = Usuario::create($request->all());
        return response()->json($usuario, 201);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        if ($usuario) {
            $usuario->update($request->all());
            return response()->json($usuario);
        }
        return response()->json(['error' => 'Usuario no encontrado'], 404);
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if ($usuario) {
            $usuario->delete();
            return response()->json(['success' => 'Usuario eliminado correctamente']);
        }
        return response()->json(['error' => 'Usuario no encontrado'], 404);
    }
}
