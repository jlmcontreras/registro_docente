<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DocenteFactory extends Factory
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
            'titulo' =>$this->faker->randomElement(['Maestro de grado', 'Celador', 'Maestro de apoyo',
                'Profesor de Informática', 'Profesor de Plástica', 'Profesor de Tecnología'
            ]),
            'persona_id'=> Persona::factory(),
        ];
    }
}
