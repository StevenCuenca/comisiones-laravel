<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Vendedor;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('vendedor')
            ->latest('fecha')
            ->get();

        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $vendedores = Vendedor::orderBy('nombre')->get();

        return view('ventas.create', compact('vendedores'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'vendedor_id' => 'required|exists:vendedores,id',
            'fecha' => 'required|date',
            'monto' => 'required|numeric|min:0.01',
        ]);

        Venta::create($datos);

        return redirect()
            ->route('ventas.index')
            ->with('success', 'Venta registrada correctamente.');
    }
}