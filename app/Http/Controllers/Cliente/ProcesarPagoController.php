<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Comprobante;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;

class ProcesarPagoController extends Controller
{
    public function index(){

        return view("components.index2");
    }
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'archivo' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'metodo_id' => 'required|exists:metodos_pago,id',
        ]);

        // Subir el archivo al almacenamiento
        $rutaArchivo = $request->file('archivo')->store('public/comprobantes');
        
        // Guardar el comprobante en la base de datos
        Comprobante::create([
            'cliente_id' => Auth::user()->id,
            'archivo' => $rutaArchivo,
            'metodo_id' => $request->metodo_id,
        ]);
    
        return redirect()->route('cliente.producto.index')->with('mensaje', 'Pago procesado con éxito.');
    }
}