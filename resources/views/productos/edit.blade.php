@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Producto</h1>

    <form action="{{ route('productos.update', $producto->cod_producto) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom_producto">Nombre del Producto</label>
            <input type="text" name="nom_producto" class="form-control" value="{{ $producto->nom_producto }}" required>
        </div>

        <div class="form-group">
            <label for="precio_unitario">Precio Unitario</label>
            <input type="number" step="0.01" name="precio_unitario" class="form-control" value="{{ $producto->precio_unitario }}">
        </div>

        <div class="form-group">
            <label for="stock_actual">Stock Actual</label>
            <input type="number" name="stock_actual" class="form-control" value="{{ $producto->stock_actual }}">
        </div>

        <div class="form-group">
            <label for="cod_categoria">Categoría</label>
            <input type="number" name="cod_categoria" class="form-control" value="{{ $producto->cod_categoria }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
    </form>
</div>
@endsection
