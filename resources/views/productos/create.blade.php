@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agregar Producto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('productos.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nom_producto" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del Producto') }}</label>

                            <div class="col-md-6">
                                <input id="nom_producto" type="text" class="form-control @error('nom_producto') is-invalid @enderror" name="nom_producto" value="{{ old('nom_producto') }}" required>

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
                                        <option value="{{ $categoria->cod_categoria }}">{{ $categoria->nom_categoria }}</option>
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
                            <label for="descripcion" class="col-md-4 col-form-label text-md-end">{{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="precio_unitario" class="col-md-4 col-form-label text-md-end">{{ __('Precio Unitario') }}</label>

                            <div class="col-md-6">
                                <input id="precio_unitario" type="number" step="0.01" class="form-control @error('precio_unitario') is-invalid @enderror" name="precio_unitario" value="{{ old('precio_unitario') }}">

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
                                <input id="stock_actual" type="number" class="form-control @error('stock_actual') is-invalid @enderror" name="stock_actual" value="{{ old('stock_actual') }}" required>

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
                                <input id="stock_critico" type="number" class="form-control @error('stock_critico') is-invalid @enderror" name="stock_critico" value="{{ old('stock_critico') }}" required>

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
                                    {{ __('Agregar Producto') }}
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
