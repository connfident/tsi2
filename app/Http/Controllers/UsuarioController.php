<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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

    public function store(StoreUsuarioRequest $request)
    {
        // Obtener los datos validados del request
        $data = $request->validated();

        // Hashear la contraseña
        $data['password'] = Hash::make($request->password);

        // Crear el usuario con la contraseña hasheada
        $usuario = Usuario::create($data);

        return redirect()->route('home')->with('success', 'Registro exitoso. Bienvenido!');
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        if ($usuario) {
            // Obtener los datos del request
            $data = $request->all();

            // Solo hashear si se proporciona una nueva contraseña
            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            // Actualizar el usuario con los datos proporcionados
            $usuario->update($data);

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

    public function login(LoginRequest $request)
    {
        // Comprobar si el usuario existe
        $user = Usuario::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'No se encontró un usuario con ese email.']);
        }
    
        // Intentar iniciar sesión
        if (auth()->attempt($request->only('email', 'password'))) {
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
