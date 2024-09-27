<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();
        return response()->json($proveedores);
    }

    public function show($id)
    {
        $proveedor = Proveedor::find($id);
        if ($proveedor) {
            return response()->json($proveedor);
        }
        return response()->json(['error' => 'Proveedor no encontrado'], 404);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre_proveedor' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'correo' => 'nullable|string|email|max:100'
        ]);

        $proveedor = Proveedor::create($request->all());
        return response()->json($proveedor, 201);
    }

    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::find($id);
        if ($proveedor) {
            $proveedor->update($request->all());
            return response()->json($proveedor);
        }
        return response()->json(['error' => 'Proveedor no encontrado'], 404);
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);
        if ($proveedor) {
            $proveedor->delete();
            return response()->json(['success' => 'Proveedor eliminado correctamente']);
        }
        return response()->json(['error' => 'Proveedor no encontrado'], 404);
    }
}
