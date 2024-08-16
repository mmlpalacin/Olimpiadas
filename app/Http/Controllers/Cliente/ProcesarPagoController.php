<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Comprobante;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProcesarPagoController extends Controller
{
    public function index(){

        return view("components.index2");
    }
    
    public function store(Request $request)
{
    $request->validate([
        'image' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        'metodo_id' => 'required|exists:payment_methods,id',
    ]);

    if ($request->hasFile('image')) {
        // Intenta almacenar el archivo en el sistema de archivos
        $path = $request->file('image')->store('comprobantes', 'public');
        
        // Verifica si el archivo se ha almacenado correctamente
        if ($path) {
            Comprobante::create([
                'cliente_id' => Auth::user()->id,
                'archivo' => Storage::url($path),
                'metodo_id' => $request->metodo_id,
            ]);

            return redirect()->route('cliente.productos.index')->with('mensaje', 'Pago procesado con éxito.');
        } else {
            return back()->withErrors(['image' => 'El archivo no se pudo guardar.']);
        }
    } else {
        return back()->withErrors(['image' => 'No se ha subido ningún archivo.']);
    }
}
    
}