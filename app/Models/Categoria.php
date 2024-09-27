<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    protected $primaryKey = 'cod_categoria';
    protected $fillable = ['nom_categoria', 'descripcion'];
    public $timestamps = false;

    // Relación de una categoría con muchos productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'cod_categoria');
    }
}

