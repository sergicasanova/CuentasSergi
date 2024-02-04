<?php

namespace Database\Factories;

use App\Models\cuentas_bancarias;
use Illuminate\Database\Eloquent\Factories\Factory;

class cuentas_bancariasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'users_id' => \App\Models\User::factory(),
            'iban' => $this->faker->iban(),
            'nombre_cuenta' => $this->faker->word(),
            'entidad' => $this->faker->company(),
            'saldo' => $this->faker->randomFloat(2, 0, 10000),
        ];
    }
}
