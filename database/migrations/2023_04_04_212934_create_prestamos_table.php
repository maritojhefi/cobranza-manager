<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('cobrador_id')->constrained('users');
            $table->foreignId('estado_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('monto_inicial')->unsigned()->default(0);
            $table->decimal('monto_final')->unsigned()->default(0);
            $table->decimal('cuota')->unsigned()->default(0);
            $table->decimal('interes')->unsigned()->default(0);
            $table->integer('dias')->unsigned()->default(0);
            $table->date('fecha_final')->nullable();
            $table->integer('retrasos')->unsigned()->default(0);
            $table->integer('dias_por_semana')->unsigned()->default(5);
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
        Schema::dropIfExists('prestamos');
    }
}
