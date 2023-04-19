<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use App\Models\Estado;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrestamoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $inicial = $this->faker->numberBetween($min = 100, $max = 3000);
        $interes = $this->faker->randomElement([20, 30, 10]);
        $final = $inicial + ($inicial * ($interes / 100));
        $dias = $this->faker->randomElement([24, 30]);
        $cuota = $final / $dias;
        $diasPorSemana=$this->faker->randomElement([5, 6]);
        $fechaFinal=$diasPorSemana==5?addDays(20):addDays(20,true);
        $cobrador=User::where('role_id',3)->inRandomOrder()->first();
        return [
            'cobrador_id'=>$cobrador->id,
            'fecha_final'=>$fechaFinal,
            'dias_por_semana'=>$diasPorSemana,
            'user_id' => $this->faker->unique()->numberBetween($min = 1, $max = 1000),
            'monto_inicial' => $inicial,
            'monto_final' => $final,
            'cuota' => $cuota,
            'interes' => $interes,
            'dias' => $dias,
            'estado_id' => Estado::ID_PENDIENTE
        ];
    }
}