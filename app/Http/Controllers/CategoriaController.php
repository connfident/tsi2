<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }

    public function show($id)
    {
        $categoria = Categoria::find($id);
        if ($categoria) {
            return response()->json($categoria);
        }
        return response()->json(['error' => 'Categoría no encontrada'], 404);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom_categoria' => 'required|string|max:100',
            'descripcion' => 'nullable|string'
        ]);

        $categoria = Categoria::create($request->all());
        return response()->json($categoria, 201);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        if ($categoria) {
            $categoria->update($request->all());
            return response()->json($categoria);
        }
        return response()->json(['error' => 'Categoría no encontrada'], 404);
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        if ($categoria) {
            $categoria->delete();
            return response()->json(['success' => 'Categoría eliminada correctamente']);
        }
        return response()->json(['error' => 'Categoría no encontrada'], 404);
    }
}