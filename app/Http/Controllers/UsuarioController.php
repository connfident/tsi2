<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
            'email' => 'required|string|email|max:100',
            'password' => 'required|string|min:6',
            'rol' => 'required|string|max:50'
        ]);

        // Hashear la contraseña
        $request['password'] = Hash::make($request['password']);

        // Crear el usuario
        $usuario = Usuario::create($request->all());

        return redirect()->route('home')->with('success', 'Registro exitoso. Bienvenido!');
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

    public function create()
    {
        return view('auth.register'); 
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        // Comprobar si el usuario existe
        $user = Usuario::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'No se encontró un usuario con ese email.']);
        }
    
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password], )) {
            return redirect()->intended('/home')->with('success', 'Has iniciado sesión correctamente.');
        }
    
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ])->withInput($request->only('email', 'remember'));
    }

    public function mostrarLogin()
    {
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión del usuario
        return redirect('/')->with('success', 'Has cerrado sesión correctamente.');
    }
}
