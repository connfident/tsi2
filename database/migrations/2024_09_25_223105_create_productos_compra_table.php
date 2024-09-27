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
        Schema::create('productos_compra', function (Blueprint $table) {
            $table->id('cod_producto_venta');
            $table->foreignId('cod_compra')
                  ->constrained('compras', 'cod_compra')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->foreignId('cod_producto')
                  ->constrained('productos', 'cod_producto')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->integer('cantidad');
            $table->decimal('precio_compra_unitario', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_compra');
    }
};
