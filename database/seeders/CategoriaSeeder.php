<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        // Inserta algunas categorías de ejemplo en la tabla 'categoria'
        Categoria::create(['nom_categoria' => 'Frutas', 'descripcion' => 'Frutas frescas y naturales']);
        Categoria::create(['nom_categoria' => 'Panadería', 'descripcion' => 'Pan y productos de panadería']);
        Categoria::create(['nom_categoria' => 'Lácteos', 'descripcion' => 'Productos lácteos como leche, queso y yogur']);
        Categoria::create(['nom_categoria' => 'Aceites y grasas', 'descripcion' => 'Aceites y grasas para cocina']);
        Categoria::create(['nom_categoria' => 'Granos', 'descripcion' => 'Granos y semillas']);
        Categoria::create(['nom_categoria' => 'Carnes', 'descripcion' => 'Productos cárnicos']);
        Categoria::create(['nom_categoria' => 'Pastas', 'descripcion' => 'Pasta, fideos y similares']);
    }
}
