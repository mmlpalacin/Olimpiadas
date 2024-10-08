<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'categoria_id', 'stock'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function detallesOrden()
    {
        return $this->hasMany(DetalleOrden::class);
    }
}
