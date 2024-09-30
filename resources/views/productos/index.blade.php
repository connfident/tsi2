@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Lista de Productos</h1>

    <!-- Botón para crear un nuevo producto -->
    <div class="mb-3">
        <a href="{{ route('productos.create') }}" class="btn btn-primary">Agregar Producto</a>
    </div>

    <!-- Tabla para listar los productos -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio Unitario</th>
                <th>Stock Actual</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->cod_producto }}</td>
                    <td>{{ $producto->nom_producto }}</td>
                    <td>{{ $producto->precio_unitario }}</td>
                    <td>{{ $producto->stock_actual }}</td>
                    <td>
                        <!-- Botón para ver detalles del producto -->
                        <a href="{{ route('productos.show', $producto->cod_producto) }}" class="btn btn-info btn-sm">
                            <i class="bi bi-eye"></i> Ver
                        </a>

                        <!-- Botón para editar el producto -->
                        <a href="{{ route('productos.edit', $producto->cod_producto) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> Editar
                        </a>

                        <!-- Formulario para eliminar un producto -->
                        <form action="{{ route('productos.destroy', $producto->cod_producto) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este producto?')">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
