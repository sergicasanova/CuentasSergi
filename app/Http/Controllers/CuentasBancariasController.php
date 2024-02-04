<?php

namespace App\Http\Controllers;

use App\Models\cuentas_bancarias;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storecuentas_bancariasRequest;
use App\Http\Requests\Updatecuentas_bancariasRequest;

class CuentasBancariasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return cuentas_bancarias::get();
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
    public function store(Storecuentas_bancariasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(cuentas_bancarias $cuentas_bancarias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cuentas_bancarias $cuentas_bancarias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatecuentas_bancariasRequest $request, cuentas_bancarias $cuentas_bancarias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cuentas_bancarias $cuentas_bancarias)
    {
        $cuentas_bancarias->delete();
        return response()->json([
            'message' => 'cuenta bancaria borrada',
            'cuenta_bancaria' => $cuentas_bancarias
        ]);
    }
}
