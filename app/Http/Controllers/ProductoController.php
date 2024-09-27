<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos')); // Asegúrate de que 'productos.index' es la vista correcta
    }

    public function show($id)
    {
        $producto = Producto::find($id);
        if ($producto) {
            return response()->json($producto);
        }
        return response()->json(['error' => 'Producto no encontrado'], 404);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom_producto' => 'required|string|max:255',
            'precio_unitario' => 'nullable|numeric',
            'stock_actual' => 'nullable|integer',
            'stock_critico' => 'nullable|integer',
            'cod_categoria' => 'required|integer'
        ]);

        $producto = Producto::create($request->all());
        return response()->json($producto, 201);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        if ($producto) {
            $producto->update($request->all());
            return response()->json($producto);
        }
        return response()->json(['error' => 'Producto no encontrado'], 404);
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);
        if ($producto) {
            $producto->delete();
            return response()->json(['success' => 'Producto eliminado correctamente']);
        }
        return response()->json(['error' => 'Producto no encontrado'], 404);
    }
}
