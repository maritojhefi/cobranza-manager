<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCajaSemanalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caja_semanals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cobrador_id')->constrained('users');
            $table->foreignId('estado_id')->constrained();
            $table->date('fecha_inicial');
            $table->decimal('monto_inicial')->default(0);
            $table->date('fecha_final')->nullable();
            $table->decimal('monto_final')->nullable()->default(0);
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
        Schema::dropIfExists('caja_semanals');
    }
}
