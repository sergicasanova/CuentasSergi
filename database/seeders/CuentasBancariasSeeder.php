<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\cuentas_bancarias;

class CuentasBancariasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Obtén 5 usuarios creados anteriormente
        $users = \App\Models\User::limit(5)->get();

        // Crea 10 cuentas bancarias para 4-5 usuarios
        cuentas_bancarias::factory()->count(10)->create([
            'users_id' => function () use ($users) {
                return $users->random()->id;
            },
        ]);
    }
}
