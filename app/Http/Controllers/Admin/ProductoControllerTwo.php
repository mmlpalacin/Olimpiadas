<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoControllerTwo extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:180',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            
            
        ]);

        // Crear una instancia del producto
        $producto = new Producto();
        $producto->nombre = $validatedData['nombre'];
        $producto->descripcion = $validatedData['descripcion'];
        $producto->precio = $validatedData['precio'];
        $producto->stock = $validatedData['stock'];
        
        

        // Guardar la instancia
        $producto->save();

        return redirect()->route('productos.create')->with('success', 'Producto agregado exitosamente.');
    }
}
