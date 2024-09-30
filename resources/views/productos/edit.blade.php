@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Producto') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('productos.update', $producto->cod_producto) }}">
                        @csrf
                        @method('PUT')
                        
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <div class="row mb-3">
                            <label for="nom_producto" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del Producto') }}</label>

                            <div class="col-md-6">
                                <input id="nom_producto" type="text" class="form-control @error('nom_producto') is-invalid @enderror" name="nom_producto" value="{{ old('nom_producto', $producto->nom_producto) }}" required>

                                @error('nom_producto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cod_categoria" class="col-md-4 col-form-label text-md-end">{{ __('Categoría') }}</label>

                            <div class="col-md-6">
                                <select id="cod_categoria" class="form-control @error('cod_categoria') is-invalid @enderror" name="cod_categoria" required>
                                    <option value="">{{ __('Seleccione una categoría') }}</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->cod_categoria }}" {{ $producto->cod_categoria == $categoria->cod_categoria ? 'selected' : '' }}>{{ $categoria->nom_categoria }}</option>
                                    @endforeach
                                </select>

                                @error('cod_categoria')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="precio_unitario" class="col-md-4 col-form-label text-md-end">{{ __('Precio Unitario') }}</label>

                            <div class="col-md-6">
                                <input id="precio_unitario" type="number" step="1" class="form-control @error('precio_unitario') is-invalid @enderror" name="precio_unitario" value="{{ old('precio_unitario', $producto->precio_unitario) }}" required>

                                @error('precio_unitario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="stock_actual" class="col-md-4 col-form-label text-md-end">{{ __('Stock Actual') }}</label>

                            <div class="col-md-6">
                                <input id="stock_actual" type="number" class="form-control @error('stock_actual') is-invalid @enderror" name="stock_actual" value="{{ old('stock_actual', $producto->stock_actual) }}" required>

                                @error('stock_actual')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="stock_critico" class="col-md-4 col-form-label text-md-end">{{ __('Stock Crítico') }}</label>

                            <div class="col-md-6">
                                <input id="stock_critico" type="number" class="form-control @error('stock_critico') is-invalid @enderror" name="stock_critico" value="{{ old('stock_critico', $producto->stock_critico) }}" required>

                                @error('stock_critico')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar Producto') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection