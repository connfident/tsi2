<?php

namespace App\Http\Controllers;

use App\Models\Ajuste;
use Illuminate\Http\Request;

class AjusteController extends Controller
{
    public function index()
    {
        $ajustes = Ajuste::with('producto')->get();
        return response()->json($ajustes);
    }

    public function show($id)
    {
        $ajuste = Ajuste::with('producto')->find($id);
        if ($ajuste) {
            return response()->json($ajuste);
        }
        return response()->json(['error' => 'Ajuste no encontrado'], 404);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cod_producto' => 'required|integer',
            'fecha_ajuste' => 'required|date',
            'tipo_ajuste' => 'required|string|max:50',
            'cantidad' => 'required|integer',
            'motivo' => 'nullable|string',
            'cod_usuario' => 'required|integer'
        ]);

        $ajuste = Ajuste::create($request->all());
        return response()->json($ajuste, 201);
    }

    public function update(Request $request, $id)
    {
        $ajuste = Ajuste::find($id);
        if ($ajuste) {
            $ajuste->update($request->all());
            return response()->json($ajuste);
        }
        return response()->json(['error' => 'Ajuste no encontrado'], 404);
    }

    public function destroy($id)
    {
        $ajuste = Ajuste::find($id);
        if ($ajuste) {
            $ajuste->delete();
            return response()->json(['success' => 'Ajuste eliminado correctamente']);
        }
        return response()->json(['error' => 'Ajuste no encontrado'], 404);
    }
}
