@extends('layouts.app')

@section('title', 'Ventas | Sistema de Comisiones')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h2>Ventas registradas</h2>
            <p>Consulta y registra las ventas de cada vendedor.</p>
        </div>

        <a class="btn" href="{{ route('ventas.create') }}">
            + Nueva venta
        </a>
    </div>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @if ($ventas->isEmpty())
        <p class="warning">Aún no existen ventas registradas.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Vendedor</th>
                    <th>Fecha</th>
                    <th>Monto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ $venta->vendedor->nombre }}</td>
                        <td>{{ $venta->fecha->format('d/m/Y') }}</td>
                        <td>${{ number_format($venta->monto, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection