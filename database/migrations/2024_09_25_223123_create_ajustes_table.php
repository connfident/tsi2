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
        Schema::create('ajustes', function (Blueprint $table) {
            $table->id('cod_ajuste');
            $table->foreignId('cod_producto')
                  ->constrained('productos', 'cod_producto')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->date('fecha_ajuste');
            $table->string('tipo_ajuste', 50);
            $table->integer('cantidad');
            $table->text('motivo')->nullable();
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
        Schema::dropIfExists('ajustes');
    }
};
