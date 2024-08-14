<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Orden;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $categories = Categoria::all();
        $query = Producto::query();

        $cartCount = orden::where('user_id', Auth::id())->sum('cantidad');
        // Aplicar filtros si están presentes
        if ($request->filled('min_price')) {
            $query->where('precio', '>=', $request->input('min_price'));
        }

        if ($request->filled('max_price')) {
            $query->where('precio', '<=', $request->input('max_price'));
        }

        if ($request->filled('category')) {
            $query->where('categoria_id', $request->input('category'));
        }

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('nombre', 'like', '%' . $searchTerm . '%');
        }
        
        $products = $query->get();

        return view('welcom', compact('products', 'categories', 'cartCount'));
    }
}