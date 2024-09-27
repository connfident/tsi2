@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Producto</h1>

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom_producto">Nombre del Producto</label>
            <input type="text" name="nom_producto" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="precio_unitario">Precio Unitario</label>
            <input type="number" step="0.01" name="precio_unitario" class="form-control">
        </div>

        <div class="form-group">
            <label for="stock_actual">Stock Actual</label>
            <input type="number" name="stock_actual" class="form-control">
        </div>

        <div class="form-group">
            <label for="cod_categoria">Categoría</label>
            <input type="number" name="cod_categoria" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
</div>
@endsection
