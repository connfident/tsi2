<?php

namespace App\Http\Controllers;

use App\Models\ProductoCompra;
use Illuminate\Http\Request;

class ProductoCompraController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'cod_compra' => 'required|integer',
            'cod_producto' => 'required|integer',
            'cantidad' => 'required|integer',
            'precio_compra_unitario' => 'required|numeric'
        ]);

        $productoCompra = ProductoCompra::create($request->all());
        return response()->json($productoCompra, 201);
    }

    public function update(Request $request, $id)
    {
        $productoCompra = ProductoCompra::find($id);
        if ($productoCompra) {
            $productoCompra->update($request->all());
            return response()->json($productoCompra);
        }
        return response()->json(['error' => 'Producto en compra no encontrado'], 404);
    }

    public function destroy($id)
    {
        $productoCompra = ProductoCompra::find($id);
        if ($productoCompra) {
            $productoCompra->delete();
            return response()->json(['success' => 'Producto en compra eliminado correctamente']);
        }
        return response()->json(['error' => 'Producto en compra no encontrado'], 404);
    }
}
