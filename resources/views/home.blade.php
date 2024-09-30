@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Inicio</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-4">
                <div class="card-body">
                    <h5 class="card-title">Ventas del Mes</h5>
                    <h2 class="card-text">6</h2>
                    <a href="#" class="btn btn-light">Ver Ventas</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success mb-4">
                <div class="card-body">
                    <h5 class="card-title">Compras/Stock</h5>
                    <h2 class="card-text">+ 11</h2>
                    <a href="#" class="btn btn-light">Ver Stock</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning mb-4">
                <div class="card-body">
                    <h5 class="card-title">Proveedores</h5>
                    <h2 class="card-text">1</h2>
                    <a href="#" class="btn btn-light">Ver Proveedores</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-danger mb-4">
                <div class="card-body">
                    <h5 class="card-title">Reportes</h5>
                    <h2 class="card-text">Agosto</h2>
                    <a href="#" class="btn btn-light">Más Información</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Cargar Venta</h5>
            <form>
                <div class="mb-3">
                    <label for="articulo" class="form-label">Artículo</label>
                    <select id="articulo" class="form-control @error('articulo') is-invalid @enderror" name="articulo" required>
                        <option value="">{{ __('Seleccione un artículo') }}</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->cod_producto }}">{{ $producto->nom_producto }}</option>
                        @endforeach
                    </select>

                    @error('articulo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" id="cantidad" required>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="text" class="form-control" id="precio" required>
                </div>

                <button type="submit" class="btn btn-primary">Cargar</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Realizar Venta</h5>
            <p>Aquí verá todos los artículos.</p>
            <h3>Total a Pagar: $0</h3>
            <button class="btn btn-success">Realizar Venta</button>
        </div>
    </div>
</div>
@endsection
