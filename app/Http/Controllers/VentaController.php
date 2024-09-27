<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('productos')->get();
        return response()->json($ventas);
    }

    public function show($id)
    {
        $venta = Venta::with('productos')->find($id);
        if ($venta) {
            return response()->json($venta);
        }
        return response()->json(['error' => 'Venta no encontrada'], 404);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fecha_venta' => 'required|date',
            'total_venta' => 'nullable|numeric',
            'cod_usuario' => 'required|integer'
        ]);

        $venta = Venta::create($request->all());
        return response()->json($venta, 201);
    }

    public function update(Request $request, $id)
    {
        $venta = Venta::find($id);
        if ($venta) {
            $venta->update($request->all());
            return response()->json($venta);
        }
        return response()->json(['error' => 'Venta no encontrada'], 404);
    }

    public function destroy($id)
    {
        $venta = Venta::find($id);
        if ($venta) {
            $venta->delete();
            return response()->json(['success' => 'Venta eliminada correctamente']);
        }
        return response()->json(['error' => 'Venta no encontrada'], 404);
    }
}
