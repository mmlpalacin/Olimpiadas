<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Orden;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function __construct()
    {

    }

    public function index(){ 
        $cartItems = Orden::where('user_id', Auth::id())->get();
        return view('cliente.carrito.index', compact('cartItems'));
    }

    public function store(Request $request)
    {
        $cart = orden::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'producto_id' => $request->producto_id
            ],
            [
                'cantidad' => 0 // Valor inicial de cantidad
            ]
        );
    
        $cart->cantidad += $request->input('cantidad', 1);
        $cart->save();

        return redirect()->route('cliente.productos.index')->with('success', 'Producto agregado al carrito');
    }

    public function update(Request $request, $id)
    {
        $cart = orden::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'cantidad' => 'required|integer|min:1'
        ]);

        $cart->cantidad = $request->input('cantidad');
        $cart->save();

        return redirect()->route('cliente.carrito.index')->with('success', 'Producto agregado al carrito.');
    }

    public function destroy($id)
    {
        $cart = orden::where('user_id', Auth::id())->findOrFail($id);
        $cart->delete();

        return redirect()->route('cliente.carrito.index')->with('success', 'Producto eliminado del carrito.');
    }
}
