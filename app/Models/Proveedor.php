<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $primaryKey = 'cod_proveedor';
    protected $fillable = ['nombre_proveedor', 'direccion', 'telefono', 'email'];

    // Relación de un proveedor con muchas compras
    public function compras()
    {
        return $this->hasMany(Compra::class, 'cod_proveedor');
    }
}
