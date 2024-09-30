<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Asegúrate de importar esto
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable // Cambiar Model a Authenticatable
{
    use HasFactory, Notifiable; // No olvides usar HasFactory y Notifiable

    protected $table = 'usuarios';
    protected $primaryKey = 'cod_usuario';
    protected $fillable = ['nom_usuario', 'email', 'password', 'rol'];

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

    // Para ocultar el campo de contraseña al serializar
    protected $hidden = [
        'password', 'remember_token',
    ];
}
