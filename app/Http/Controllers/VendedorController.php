<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    public function index()
    {
        $vendedores = Vendedor::latest()->get();

        return view('vendedores.index', compact('vendedores'));
    }

    public function create()
    {
        return view('vendedores.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|unique:vendedores,email',
            'telefono' => 'nullable|string|max:20',
        ]);

        Vendedor::create($datos);

        return redirect('/vendedores')
            ->with('success', 'Vendedor registrado correctamente.');
    }
}