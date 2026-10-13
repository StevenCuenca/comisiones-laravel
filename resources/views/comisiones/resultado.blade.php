@extends('layouts.app')

@section('title', 'Resultado de comisión | Sistema de Comisiones')

@section('content')
    <h2>Resultado de comisión</h2>
    <p>Resumen del cálculo realizado.</p>

    <table>
        <tr>
            <th>Vendedor</th>
            <td>{{ $vendedor->nombre }}</td>
        </tr>
        <tr>
            <th>Período consultado</th>
            <td>
                {{ \Carbon\Carbon::parse($datos['fecha_inicio'])->format('d/m/Y') }}
                al
                {{ \Carbon\Carbon::parse($datos['fecha_fin'])->format('d/m/Y') }}
            </td>
        </tr>
        <tr>
            <th>Total vendido</th>
            <td>${{ number_format((float) $totalVentas, 2) }}</td>
        </tr>
        <tr>
            <th>Porcentaje aplicado</th>
            <td>{{ number_format((float) $porcentaje, 2) }}%</td>
        </tr>
        <tr>
            <th>Comisión calculada</th>
            <td class="result">${{ number_format((float) $comision, 2) }}</td>
        </tr>
    </table>

    @if ($regla)
        <p class="success">
            Se aplicó la regla desde
            ${{ number_format((float) $regla->umbral, 2) }}
            con un porcentaje de
            {{ number_format((float) $regla->porcentaje, 2) }}%.
        </p>
    @else
        <p class="warning">
            El total no alcanza el umbral mínimo de $500.00, por lo que la comisión es $0.00.
        </p>
    @endif

    <a class="btn" href="{{ route('comisiones.index') }}">
        Realizar otro cálculo
    </a>
@endsection