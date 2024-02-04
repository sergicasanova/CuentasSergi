<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoremovimientosRequest;
use App\Http\Requests\UpdatemovimientosRequest;
use App\Models\movimientos;

class MovimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return movimientos::get();
    }

    public function indexIngresos()
    {
        return Movimientos::where('tipo', 'ingreso')->get();
    }

    public function indexGastos()
    {
        return Movimientos::where('tipo', 'gasto')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoremovimientosRequest $request)
    {
        //
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
    public function update(UpdatemovimientosRequest $request, movimientos $movimientos)
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
