<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoVenta extends Model
{
    protected $table = 'productos_venta';
    protected $primaryKey = 'cod_producto_venta';
    public $timestamps = false; // Si no tienes columnas de timestamps en esta tabla
    protected $fillable = ['cod_venta', 'cod_producto', 'cantidad', 'precio_venta_unitario'];

    // Relación con el producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'cod_producto');
    }

    // Relación con la venta
    public function venta()
    {
        return $this->belongsTo(Venta::class, 'cod_venta');
    }
}
