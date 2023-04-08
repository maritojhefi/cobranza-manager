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
            $table->foreignId('estado_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->float('monto_inicial')->unsigned()->default(0);
            $table->float('monto_final')->unsigned()->default(0);
            $table->float('cuota')->unsigned()->default(0);
            $table->float('interes')->unsigned()->default(0);
            $table->integer('dias')->unsigned()->default(0);

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
