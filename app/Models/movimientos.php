<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimientos extends Model
{
    use HasFactory;

    protected $table = 'movimientos';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'concepto',
        'cantidad',
        'tipo',
        'cuentas_bancarias_id', // Agrega la clave foránea a los fillables
    ];

    public function cuentaBancaria()
    {
        return $this->belongsTo(cuentas_bancarias::class, 'cuentas_bancarias_id');
    }
}
