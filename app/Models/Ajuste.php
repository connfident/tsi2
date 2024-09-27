<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ajuste extends Model
{
    protected $table = 'ajustes';
    protected $primaryKey = 'cod_ajuste';
    protected $fillable = ['cod_producto', 'fecha_ajuste', 'tipo_ajuste', 'cantidad', 'motivo', 'cod_usuario'];

    // Relación con el producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'cod_producto');
    }

    // Relación con el usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'cod_usuario');
    }
}