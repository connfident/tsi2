<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        // Inserta alimentos en la tabla 'productos'
        Producto::create([
            'nom_producto' => 'Manzana Roja',
            'precio_unitario' => 0.50,
            'stock_actual' => 100,
            'stock_critico' => 10,
            'cod_categoria' => 1, // ID de la categoría 'Frutas'
        ]);

        Producto::create([
            'nom_producto' => 'Pan Integral',
            'precio_unitario' => 1.20,
            'stock_actual' => 50,
            'stock_critico' => 5,
            'cod_categoria' => 2, // ID de la categoría 'Panadería'
        ]);

        Producto::create([
            'nom_producto' => 'Leche Entera 1L',
            'precio_unitario' => 0.90,
            'stock_actual' => 200,
            'stock_critico' => 20,
            'cod_categoria' => 3, // ID de la categoría 'Lácteos'
        ]);

        Producto::create([
            'nom_producto' => 'Queso Cheddar 500g',
            'precio_unitario' => 3.50,
            'stock_actual' => 75,
            'stock_critico' => 10,
            'cod_categoria' => 3, // ID de la categoría 'Lácteos'
        ]);

        Producto::create([
            'nom_producto' => 'Aceite de Oliva 500ml',
            'precio_unitario' => 5.00,
            'stock_actual' => 60,
            'stock_critico' => 5,
            'cod_categoria' => 4, // ID de la categoría 'Aceites y grasas'
        ]);

        Producto::create([
            'nom_producto' => 'Arroz Blanco 1kg',
            'precio_unitario' => 1.00,
            'stock_actual' => 300,
            'stock_critico' => 20,
            'cod_categoria' => 5, // ID de la categoría 'Granos'
        ]);

        Producto::create([
            'nom_producto' => 'Pechuga de Pollo 1kg',
            'precio_unitario' => 4.50,
            'stock_actual' => 100,
            'stock_critico' => 10,
            'cod_categoria' => 6, // ID de la categoría 'Carnes'
        ]);

        Producto::create([
            'nom_producto' => 'Pasta Espagueti 500g',
            'precio_unitario' => 0.80,
            'stock_actual' => 150,
            'stock_critico' => 15,
            'cod_categoria' => 7, // ID de la categoría 'Pastas'
        ]);
    }
}
