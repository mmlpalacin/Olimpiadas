<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Orden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function index(){
        return view('dashboard');
    }
    public function store(Request $request)
    {
        if(Auth::check()){
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
        } else {
            return view('auth.register');
        }
    }

    public function update(Request $request, $id)
    {
        $cart = orden::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'cantidad' => 'required|integer|min:1'
        ]);

        $cart->cantidad = $request->input('cantidad');
        $cart->save();

        return redirect()->route('dashboard')->with('success', 'Producto agregado al carrito.');
    }

    public function destroy($id)
    {
        $cart = orden::where('user_id', Auth::id())->findOrFail($id);
        $cart->delete();

        return redirect()->route('dashboard')->with('success', 'Producto eliminado del carrito.');
    }
}
