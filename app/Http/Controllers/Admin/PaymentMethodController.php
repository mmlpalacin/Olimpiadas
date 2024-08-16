<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        return view('admin.index', compact('paymentMethods'));
    }

    // Mostrar el formulario para crear un nuevo método de pago
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'metodo' => 'required|unique:payment_methods,metodo',
            'nombre_titular' => 'required|string|max:50',
            'fecha_venc' => 'required|date', // formato es mes/año
            'cvv' => 'required|digits:3',
        ]);

        PaymentMethod::create($validatedData);
        return redirect()->route('payment.index')->with('success', 'Método de pago creado exitosamente.');
    }

    public function destroy(paymentmethod $method)
    {
        $method->delete();

        return redirect()->route('payment.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
