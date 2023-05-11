<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'password' => 123, // password
            'apellido'=> $this->faker->lastName(),
            'email'=> $this->faker->email(),
            'ci'=> $this->faker->unique()->randomNumber($nbDigits = NULL, $strict = false),
            'telf'=> $this->faker->unique()->mobileNumber(),
            'direccion'=> $this->faker->address(),
            'lat'=> $this->faker->latitude($min = -21, $max = -22),
            'long'=> $this->faker->longitude($min = -64, $max = -65),
            'estado_id'=> 1,
            'role_id'=> $this->faker->randomElement([3,4]),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
