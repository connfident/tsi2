<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoCompra extends Model
{
    protected $table = 'productos_compra';
    protected $primaryKey = 'cod_producto_venta'; // o puedes renombrarlo si es más claro
    public $timestamps = false; // Si no tienes columnas de timestamps en esta tabla
    protected $fillable = ['cod_compra', 'cod_producto', 'cantidad', 'precio_compra_unitario'];

    // Relación con el producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'cod_producto');
    }

    // Relación con la compra
    public function compra()
    {
        return $this->belongsTo(Compra::class, 'cod_compra');
    }
}