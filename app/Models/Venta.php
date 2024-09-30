<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
    protected $primaryKey = 'cod_venta';
    protected $fillable = ['fecha_venta', 'total_venta', 'cod_usuario'];

    // Relación con el usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'cod_usuario');
    }

    // Relación de una venta con muchos productos
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'productos_venta', 'cod_venta', 'cod_producto')
                    ->withPivot('cantidad', 'precio_venta_unitario');
    }

    public function productosVenta()
    {
        return $this->hasMany(ProductoVenta::class, 'cod_venta');
    }

    
}
