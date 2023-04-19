<?php

namespace Database\Factories;

use Carbon\Carbon;
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
        $id_prestamo = $this->faker->numberBetween($min = 1, $max = 30);
        $prestamo = Prestamo::findOrFail($id_prestamo);
        return [
            'prestamo_id' => $id_prestamo,
            'monto_abono' => $prestamo->cuota,
            'fecha' => Carbon::now(),
            'long' => $this->faker->longitude(),
            'lat' => $this->faker->latitude()
        ];
    }
}
