<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';
    protected $primaryKey = 'cod_compra';
    protected $fillable = ['fecha_compra', 'total_compra', 'cod_proveedor', 'cod_usuario'];

    // Relación con el proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'cod_proveedor');
    }

    // Relación con el usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'cod_usuario');
    }

    // Relación de una compra con muchos productos
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'productos_compra', 'cod_compra', 'cod_producto')
                    ->withPivot('cantidad', 'precio_compra_unitario');
    }

    public function productosCompra()
    {
        return $this->hasMany(ProductoCompra::class, 'cod_compra');
    }
}