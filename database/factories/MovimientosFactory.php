<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\movimientos>
 */
class MovimientosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cantidad = $this->faker->randomFloat(2, 0, 1000); // Rango de 0 a 1000

        return [
            'cantidad' => $this->faker->randomFloat(2, 0, 1000),
            'concepto' => $this->faker->text(),
            'tipo' => $this->faker->randomElement(['ingreso', 'gasto']),
        ];
    }
}
