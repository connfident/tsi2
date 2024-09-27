<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'cod_usuario';
    protected $fillable = ['nom_usuario', 'correo', 'contraseña', 'rol'];

    // Relación de un usuario con muchas compras
    public function compras()
    {
        return $this->hasMany(Compra::class, 'cod_usuario');
    }

    // Relación de un usuario con muchas ventas
    public function ventas()
    {
        return $this->hasMany(Venta::class, 'cod_usuario');
    }

    // Relación de un usuario con muchos ajustes
    public function ajustes()
    {
        return $this->hasMany(Ajuste::class, 'cod_usuario');
    }
}