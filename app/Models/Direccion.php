<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo_postal',
        'direccion',
        'pais',
        'usuario_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ordenes()
    {
        return $this->hasMany(DetalleOrden::class);
    }
}
