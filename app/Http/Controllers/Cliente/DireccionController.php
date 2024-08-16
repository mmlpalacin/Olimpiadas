<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Direccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DireccionController extends Controller
{
    public function index(){
        return view('components.LocIndex');
    }
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'codigo_postal' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'pais' => 'required|string|max:100',
        ]);

        $usuario_id = Auth::id();

        // Crear una nueva dirección con el usuario_id
        Direccion::create([
            'codigo_postal' => $request->codigo_postal,
            'direccion' => $request->direccion,
            'pais' => $request->pais,
            'usuario_id' => $usuario_id,
        ]);

        return redirect()->route('procesarPago.index');
    }
}