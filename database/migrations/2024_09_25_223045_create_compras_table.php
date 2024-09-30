<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id('cod_compra');
            $table->date('fecha_compra');
            $table->decimal('total_compra', 10, 2);
            $table->foreignId('cod_proveedor')
                  ->constrained('proveedores', 'cod_proveedor')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->foreignId('cod_usuario')
                  ->constrained('usuarios', 'cod_usuario')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
};
