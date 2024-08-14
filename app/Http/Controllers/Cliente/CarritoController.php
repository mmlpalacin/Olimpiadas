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
        $cartItem = orden::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'producto_id' => $request->producto
            ],
            [
                'cantidad' => 0 // Valor inicial de cantidad
            ]
        );
    
        // Incrementar la cantidad del producto en el carrito
        $cartItem->cantidad += $request->input('cantidad', 1);
        $cartItem->save();

        return redirect()->route('cliente.carrito.index')->with('success', 'Producto agregado al cart.');
    }

    public function clear()
    {
        $cart = orden::where('user_id', Auth::id())->first();
        if ($cart) {
            $cart->productos = json_encode([]);
            $cart->save();
        }

        return redirect()->route('cart.index')->with('success', 'Carrito vaciado.');
    }

    public function update(Request $request, $id)
{
    // Encontrar el ítem del carrito por ID
    $cartItem = orden::where('user_id', Auth::id())->findOrFail($id);

    // Validar la cantidad recibida
    $request->validate([
        'cantidad' => 'required|integer|min:1'
    ]);

    // Actualizar la cantidad del ítem del carrito
    $cartItem->cantidad = $request->input('cantidad');
    $cartItem->save();

    // Redirigir de vuelta al carrito con un mensaje de éxito
    return redirect()->route('cliente.carrito.index')->with('success', 'Producto agregado al cart.');
    }
    public function destroy($id)
{
    // Encontrar el ítem del carrito por ID
    $cartItem = orden::where('user_id', Auth::id())->findOrFail($id);

    // Eliminar el ítem del carrito
    $cartItem->delete();

    // Redirigir de vuelta al carrito con un mensaje de éxito
    return redirect()->route('cliente.carrito.index')->with('success', 'Producto eliminado del carrito.');
}
}
