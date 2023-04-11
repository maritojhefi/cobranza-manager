<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array=[Estado::ESTADO_LIMPIO,Estado::ESTADO_PENDIENTE,Estado::ESTADO_FINALIZADO];
        foreach($array as $estado)
        {
            Estado::create([
                'nombre_estado'=> $estado
            ]);
        }
    }
}
