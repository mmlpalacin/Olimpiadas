<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProcesarPagoController extends Controller
{
    public function index(){

        return view("components.index2");
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'Metodo' => 'required|string',
        ]);
    
        // Store the photo
        $photoPath = $request->file('photo')->store('public/comprobante');
        $photoUrl = Storage::url($photoPath);
    
        // Create a new PaymentMethod entry
        PaymentMethod::create([
            'comprobante' => $photoUrl,
            'Metodo' => $request->input('Metodo'),
        ]);
        return redirect()->route('dashboard')->with('mensaje', 'Pago procesado con éxito con tarjeta.');
    }
}