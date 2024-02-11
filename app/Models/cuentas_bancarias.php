<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class cuentas_bancarias extends Model
{
    use HasFactory;

    protected $table = 'cuentas_bancarias';
    protected $primaryKey = 'id';
    protected $fillable = [
        'iban',
        'nombre_cuenta',
        'entidad',
        'saldo',
        'user_id', // Agrega la clave foránea a los fillables
    ];
    public $timestamps = true;

    // Resto del código...

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Asegúrate de establecer correctamente la clave foránea
    }

    public function movimientos()
    {
        return $this->hasMany(Movimientos::class);
    }

    public function down(): void
    {
        Schema::dropIfExists('cuentas_bancarias');
    }
}

