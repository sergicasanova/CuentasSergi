<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\movimientos;
use App\Http\Controllers\Controller;
use App\Models\cuentas_bancarias;
use Illuminate\Http\Request;

class MovimientosViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(Movimientos::get());
        return Inertia::render('ListadoMovimientos',['movimientos' => movimientos::get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('CreateMovimiento', ['cuentas_bancarias' => cuentas_bancarias::get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'concepto' => ['required', 'string', 'max:255'],
            'cantidad' => ['required', 'numeric', 'min:0', 'max:9999.99'],
            'tipo' => ['required', 'in:gasto,ingreso'],
            'cuentas_bancarias_id' => ['required', 'exists:cuentas_bancarias,id'],
        ]);

        Movimientos::create($data);

        // Redireccionar a la llista de llibres
        return redirect()->route('movimientos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(movimientos $movimientos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(movimientos $movimientos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, movimientos $movimientos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(movimientos $movimientos)
    {
        //
    }
}
