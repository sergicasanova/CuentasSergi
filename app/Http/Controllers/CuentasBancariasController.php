<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cuentas_bancarias;
use App\Http\Controllers\Controller;
use App\Http\Requests\Updatecuentas_bancariasRequest;
use App\Http\Requests\Storecuentas_bancariasRequest;


class CuentasBancariasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->id();
        $cuentasBancarias = cuentas_bancarias::where('user_id', $user_id)->get();
        return response()->json($cuentasBancarias);
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
    public function store(Request $request)
    {

        $request->validate([
            'iban' => 'required',
            'nombre_cuenta' => 'required',
            'entidad' => 'required',
            'saldo' => 'required',
        ]);

        // Crear una nueva cuenta bancaria asociada al ID del usuario autenticado
        $request->user()->cuentaBancaria()->create($request->all());

        return redirect()->back()->with('success', 'Cuenta bancaria creada exitosamente.');
    }

    public function getCuentasBancariasByUserId()
    {
        $user_id = auth()->id();
        $cuentasBancarias = cuentas_bancarias::where('user_id', $user_id)->get();
        return response()->json($cuentasBancarias);
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
    public function update(Updatecuentas_bancariasRequest $request, cuentas_bancarias $cuentas_bancaria)

    {
        // Obtener el usuario actual de la solicitud HTTP
        $user = Request::user();
        print("update hihihihih");
        // Validar los datos del formulario
        $request->validate([
            'iban' => 'required',
            'nombre_cuenta' => 'required',
            'entidad' => 'required',
            'saldo' => 'required',
            'current_password' => 'required|password',
        ]);

        // Crear o actualizar la cuenta bancaria del usuario
        $user->cuentas_bancarias()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'iban' => $request->iban,
                'nombre_cuenta' => $request->nombre_cuenta,
                'entidad' => $request->entidad,
                'saldo' => $request->saldo,
            ]
        );

        return redirect()->back()->with('success', 'Cuenta bancaria actualizada exitosamente.');
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
