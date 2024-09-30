<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest; // Importar el Request que creamos
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Protege todas las acciones de este controlador
    }

    public function index()
    {
        // Carga los productos junto con la relación de categorías
        $productos = Producto::with('categoria')->get();
        $categorias = Categoria::all(); // Carga todas las categorías

        return view('productos.index', compact('productos', 'categorias')); // Pasa ambas variables a la vista
    }

    public function show($id)
    {
        $producto = Producto::find($id);
        if ($producto) {
            return response()->json($producto);
        }
        return response()->json(['error' => 'Producto no encontrado'], 404);
    }

    public function create()
    {
        $categorias = Categoria::all(); // Asegúrate de tener el modelo Categoria
        return view('productos.create', compact('categorias')); // Vista para crear un producto
    }

    public function store(StoreProductoRequest $request)
    {
        // Crea el producto con los datos validados
        $producto = Producto::create($request->validated());
        return redirect()->route('productos.index')->with('success', 'Producto agregado correctamente.');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all(); // Carga todas las categorías para mostrarlas en el formulario de edición
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(StoreProductoRequest $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update($request->validated()); // Actualiza el producto con los datos validados

        return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito.');
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);
        if ($producto) {
            $producto->delete(); // Elimina el producto
            return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
        }
        return redirect()->route('productos.index')->with('error', 'Producto no encontrado');
    }

    public function mostrarProductos()
    {
        $productos = Producto::all(); // Obtener todos los productos
        return view('home', compact('productos')); // Pasar los productos a la vista
    }
}
