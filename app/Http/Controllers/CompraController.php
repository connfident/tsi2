<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::with('productos')->get();
        return response()->json($compras);
    }

    public function show($id)
    {
        $compra = Compra::with('productos')->find($id);
        if ($compra) {
            return response()->json($compra);
        }
        return response()->json(['error' => 'Compra no encontrada'], 404);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fecha_compra' => 'required|date',
            'total_compra' => 'nullable|numeric',
            'cod_proveedor' => 'required|integer',
            'cod_usuario' => 'required|integer'
        ]);

        $compra = Compra::create($request->all());
        return response()->json($compra, 201);
    }

    public function update(Request $request, $id)
    {
        $compra = Compra::find($id);
        if ($compra) {
            $compra->update($request->all());
            return response()->json($compra);
        }
        return response()->json(['error' => 'Compra no encontrada'], 404);
    }

    public function destroy($id)
    {
        $compra = Compra::find($id);
        if ($compra) {
            $compra->delete();
            return response()->json(['success' => 'Compra eliminada correctamente']);
        }
        return response()->json(['error' => 'Compra no encontrada'], 404);
    }
}
