<?php

namespace App\Http\Controllers;

use App\Models\ProductoVenta;
use Illuminate\Http\Request;

class ProductoVentaController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'cod_venta' => 'required|integer',
            'cod_producto' => 'required|integer',
            'cantidad' => 'required|integer',
            'precio_venta_unitario' => 'required|numeric'
        ]);

        $productoVenta = ProductoVenta::create($request->all());
        return response()->json($productoVenta, 201);
    }

    public function update(Request $request, $id)
    {
        $productoVenta = ProductoVenta::find($id);
        if ($productoVenta) {
            $productoVenta->update($request->all());
            return response()->json($productoVenta);
        }
        return response()->json(['error' => 'Producto en venta no encontrado'], 404);
    }

    public function destroy($id)
    {
        $productoVenta = ProductoVenta::find($id);
        if ($productoVenta) {
            $productoVenta->delete();
            return response()->json(['success' => 'Producto en venta eliminado correctamente']);
        }
        return response()->json(['error' => 'Producto en venta no encontrado'], 404);
    }
}