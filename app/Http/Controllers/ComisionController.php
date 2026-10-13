<?php

namespace App\Http\Controllers;

use App\Models\ReglaComision;
use App\Models\Vendedor;
use App\Models\Venta;
use Illuminate\Http\Request;

class ComisionController extends Controller
{
    public function index()
    {
        $vendedores = Vendedor::orderBy('nombre')->get();

        return view('comisiones.index', compact('vendedores'));
    }

    public function calcular(Request $request)
    {
        $datos = $request->validate([
            'vendedor_id' => 'required|exists:vendedores,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $vendedor = Vendedor::findOrFail($datos['vendedor_id']);

        $totalVentas = Venta::where('vendedor_id', $vendedor->id)
            ->whereBetween('fecha', [
                $datos['fecha_inicio'],
                $datos['fecha_fin'],
            ])
            ->sum('monto');

        $regla = ReglaComision::where('umbral', '<=', $totalVentas)
            ->orderByDesc('umbral')
            ->first();

        $porcentaje = $regla ? $regla->porcentaje : 0;
        $comision = $totalVentas * ($porcentaje / 100);

        return view('comisiones.resultado', compact(
            'vendedor',
            'totalVentas',
            'porcentaje',
            'comision',
            'regla',
            'datos'
        ));
    }
}