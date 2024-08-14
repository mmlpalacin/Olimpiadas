<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Orden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function __construct()
    {}

    public function index(){ 
        $cart = Orden::where('id_usuario', auth::id())->first();
        return view('cliente.carrito.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Orden::firstOrCreate(['user_id' => Auth::id()]);

        $productos = $cart->productos ? json_decode($cart->items, true) : [];
        $productId = $validated['product_id'];
        $quantity = $validated['quantity'];

   
        $productos[$productId] = ($productos[$productId] ?? 0) + $quantity;

        $cart->items = json_encode($productos);
        $cart->save();

        return redirect()->route('cliente.carrito.index')->with('success', 'Producto agregado al cart.');
    }

    public function clear()
    {
        $cart = orden::where('user_id', Auth::id())->first();
        if ($cart) {
            $cart->items = json_encode([]);
            $cart->save();
        }

        return redirect()->route('cart.index')->with('success', 'Carrito vaciado.');
    }

    public function destroy(){

    }
}
