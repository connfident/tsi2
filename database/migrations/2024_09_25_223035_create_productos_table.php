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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('cod_producto');
            $table->string('nom_producto', 255);
            $table->integer('precio_unitario')->nullable();
            $table->integer('stock_actual')->nullable();
            $table->integer('stock_critico')->nullable();
            $table->unsignedBigInteger('cod_categoria')->nullable();
        
            // Foreign key constraint
            $table->foreign('cod_categoria')->references('cod_categoria')->on('categoria')
                  ->onDelete('restrict')->onUpdate('restrict');
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};