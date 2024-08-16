<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoControllerTwo extends Controller
{
    public function index(){
        $productos = Producto::all();

        return view('admin.productos.index', compact('productos'));
    }

    public function create(){
        $categorias = Categoria::all();
        return view('admin.productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:180',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            
        ]);

        // Crear una instancia del producto
        $producto = new Producto();
        $producto->nombre = $validatedData['nombre'];
        $producto->descripcion = $validatedData['descripcion'];
        $producto->precio = $validatedData['precio'];
        $producto->stock = $validatedData['stock'];
        $producto->categoria_id = $validatedData['categoria_id'];
        
        // Guardar la instancia
        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto agregado exitosamente.');
    }


    public function edit(producto $producto)
    {
        $categorias = Categoria::all();

        return view('admin.productos.edit', compact('categorias', 'producto'));
    }


    public function update(Request $request, producto $producto)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:180',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria_id' => 'required|integer|exists:categorias,id', // Asume que tienes una tabla categorias
        ]);

        // Actualizar los datos del producto
        $producto->update($validatedData);

        // Redirigir con un mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(producto $producto)
    {
        // Eliminar el producto
        $producto->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
