@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1 class="text-center">Lista de Productos</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Botón para agregar producto -->
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
            Agregar Producto
        </button>
    </div>

    <!-- Modal de Agregar Producto -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Agregar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addProductForm" method="POST" action="{{ route('productos.store') }}">
                        @csrf
                        <!-- Campos del formulario de agregar producto -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla para listar los productos -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Código Producto</th>
                <th>Nombre</th>
                <th>Precio Unitario</th>
                <th>Stock Actual</th>
                <th>Stock Crítico</th>
                <th>Categoría</th>
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
                    <td>{{ $producto->stock_critico }}</td>
                    <td>{{ $producto->categoria->nom_categoria }}</td>
                    <td>
                        <a href="{{ route('productos.edit', $producto->cod_producto) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> Editar
                        </a>

                        <!-- Botón para abrir el modal de confirmación de eliminación -->
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#borrarModal{{ $producto->cod_producto }}">
                            <i class="bi bi-trash"></i> Eliminar
                        </button>

                        <!-- Modal de Confirmación de Borrado -->
                        <div class="modal fade" id="borrarModal{{ $producto->cod_producto }}" tabindex="-1" aria-labelledby="borrarModalLabel{{ $producto->cod_producto }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" action="{{ route('productos.destroy', $producto->cod_producto) }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="borrarModalLabel{{ $producto->cod_producto }}">Confirmación de Borrado</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Desea borrar el producto llamado <span class="text-danger fw-bold">{{ $producto->nom_producto }}</span>?
                                            <hr>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-danger">Borrar Producto</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
