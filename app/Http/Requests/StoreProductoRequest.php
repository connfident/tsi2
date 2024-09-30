<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Permitir que cualquier usuario autorizado use este request.
    }

    public function rules(): array
    {
        return [
            'nom_producto' => 'required|string|max:255',
            'cod_categoria' => 'required|exists:categoria,cod_categoria', // Asegúrate de que la tabla y el campo sean correctos.
            'precio_unitario' => 'required|numeric|gt:0', // Validación de número mayor que 0.
            'stock_actual' => 'required|integer', // Permite 0.
            'stock_critico' => 'required|integer|gt:0', // Asegura que stock crítico sea mayor que 0.
        ];
    }

    public function messages(): array
    {
        return [
            'nom_producto.required' => 'El nombre del producto es obligatorio.',
            'nom_producto.max' => 'El nombre del producto no debe superar los 255 caracteres.',
            'cod_categoria.required' => 'Debe seleccionar una categoría.',
            'cod_categoria.exists' => 'La categoría seleccionada no es válida.',
            'precio_unitario.required' => 'El precio unitario es obligatorio.',
            'precio_unitario.numeric' => 'El precio unitario debe ser un número.',
            'precio_unitario.gt' => 'El precio unitario debe ser mayor que 0.', // Mensaje para validación gt:0
            'stock_actual.required' => 'El stock actual es obligatorio.',
            'stock_actual.integer' => 'El stock actual debe ser un número entero.',
            'stock_critico.required' => 'El stock crítico es obligatorio.',
            'stock_critico.integer' => 'El stock crítico debe ser un número entero.',
            'stock_critico.gt' => 'El stock crítico debe ser mayor que 0.', // Mensaje para validación gt:0
        ];
    }
}
