<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    use HasFactory;

    protected $table = 'comprobantes';

    protected $fillable = [
        'cliente_id',
        'archivo',
        'metodo_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(User::class);
    }

}
