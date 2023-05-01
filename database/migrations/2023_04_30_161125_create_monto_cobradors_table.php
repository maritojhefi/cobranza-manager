<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMontoCobradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monto_cobradors', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto_actual')->unsigned()->default(0);
            $table->decimal('monto_aumento')->unsigned()->default(0);
            $table->decimal('monto_total')->unsigned()->default(0);
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('monto_cobradors');
    }
}
