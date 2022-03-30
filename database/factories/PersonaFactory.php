<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'documento' => $this->faker->numberBetween($min = 1000000, $max = 5000000),
            'apellido' => $this->faker->lastName,
            'nombres' => $this->faker->firstName,
            'sexo' =>$this->faker->randomElement($array = array ('M','F')),
            'fecha_nacimiento' => $this->faker->date(),
            'domicilio' => $this->faker->address,
            'localidad' => $this->faker->city,
            'departamento' => $this->faker->state,
            'telefono' => $this->faker->phoneNumber,
            'celular' => $this->faker->phoneNumber,
            'correo' => $this->faker->email,
        ];
    }
}
