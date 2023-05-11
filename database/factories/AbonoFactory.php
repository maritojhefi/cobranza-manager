<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Abono;
use App\Models\Prestamo;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbonoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $prestamo = Prestamo::inRandomOrder()->first();
        $ultimo=Abono::where('prestamo_id',$prestamo->id)->get()->last();
        $abono=$prestamo->cuota+rand(-10,15);
        if($ultimo)
        {
            $fecha=Carbon::parse($ultimo->fecha)->addDay();
            dd($fecha);
        }
        else
        {
            $fecha=Carbon::parse($prestamo->fecha)->addDay();
        }
        return [
            'caja_id'=>getCurrentCaja($prestamo->cobrador_id,$fecha),
            'prestamo_id' => $prestamo->id,
            'monto_abono' => $abono,
            'fecha' => $fecha,
            'long' => $this->faker->longitude(),
            'lat' => $this->faker->latitude(),
            'created_at'=>$fecha
        ];
    }
}
