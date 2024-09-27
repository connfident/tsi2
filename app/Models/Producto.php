<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'cod_producto';
    protected $fillable = ['nom_producto', 'precio_unitario', 'stock_actual', 'stock_critico', 'cod_categoria'];

    // Relación con la categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'cod_categoria');
    }

    // Relación de un producto con muchas compras
    public function compras()
    {
        return $this->belongsToMany(Compra::class, 'productos_compra', 'cod_producto', 'cod_compra')
                    ->withPivot('cantidad', 'precio_compra_unitario');
    }

    // Relación de un producto con muchas ventas
    public function ventas()
    {
        return $this->belongsToMany(Venta::class, 'productos_venta', 'cod_producto', 'cod_venta')
                    ->withPivot('cantidad', 'precio_venta_unitario');
    }

    // Relación de un producto con muchos ajustes
    public function ajustes()
    {
        return $this->hasMany(Ajuste::class, 'cod_producto');
    }

    public function productosVenta()
    {
        return $this->hasMany(ProductoVenta::class, 'cod_producto');
    }

}
