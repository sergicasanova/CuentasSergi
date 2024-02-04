<?php

namespace Database\Seeders;
use App\Models\cuentas_bancarias;
use App\Models\movimientos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovimientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cuentas_bancarias = cuentas_bancarias::all();

        $cuentas_bancarias->each(function ($cuenta_bancaria) {
            return movimientos::factory()->count(5)->create([
                'cuentas_bancarias_id' => $cuenta_bancaria->id,
            ]);
        });
    }
}
