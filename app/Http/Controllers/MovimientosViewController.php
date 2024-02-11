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
    $user_id = auth()->id();

    // Obtener los IDs de las cuentas bancarias del usuario
    //pluck() en Laravel se utiliza para obtener una colección de valores de una única columna de la tabla de la base de datos
    $cuentas_bancarias_ids = cuentas_bancarias::where('user_id', $user_id)->pluck('id');

    // Obtener los movimientos que coinciden con los IDs de las cuentas bancarias del usuario
    $movimientos = movimientos::whereIn('cuentas_bancarias_id', $cuentas_bancarias_ids)->get();

    return Inertia::render('ListadoMovimientos', ['movimientos' => $movimientos]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_id = auth()->id();
        return Inertia::render('CreateMovimiento', ['cuentas_bancarias' => cuentas_bancarias::where('user_id', $user_id)->get()]);
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
        $movimientos->delete();
        return response()->json([
            'message' => 'movimientos borrado',
            'movimientos' => $movimientos
        ]);
    }
}
