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
        Schema::create('productos_venta', function (Blueprint $table) {
            $table->id('cod_producto_venta');
            $table->foreignId('cod_venta')
                  ->constrained('ventas', 'cod_venta')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->foreignId('cod_producto')
                  ->constrained('productos', 'cod_producto')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->integer('cantidad');
            $table->decimal('precio_venta_unitario', 10, 2);;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_venta');
    }
};
