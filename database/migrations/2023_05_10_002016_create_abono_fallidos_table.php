<?php

use App\Models\AbonoFallido;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonoFallidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abono_fallidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prestamo_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->date('fecha')->nullable();
            $table->string('motivo', 100)->nullable()->default(AbonoFallido::MOTIVOSNOPAGO[0]);
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
        Schema::dropIfExists('abono_fallidos');
    }
}
