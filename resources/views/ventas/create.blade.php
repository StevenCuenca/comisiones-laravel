@extends('layouts.app')

@section('title', 'Nueva venta | Sistema de Comisiones')

@section('content')
    <h2>Registrar venta</h2>
    <p>Selecciona el vendedor e ingresa los datos de la venta.</p>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($vendedores->isEmpty())
        <p class="warning">No existen vendedores registrados.</p>

        <a class="btn" href="{{ route('vendedores.create') }}">
            Registrar vendedor
        </a>
    @else
        <form action="{{ route('ventas.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="vendedor_id">Vendedor</label>
                <select id="vendedor_id" name="vendedor_id" required>
                    <option value="">Seleccione un vendedor</option>

                    @foreach ($vendedores as $vendedor)
                        <option
                            value="{{ $vendedor->id }}"
                            @selected(old('vendedor_id') == $vendedor->id)
                        >
                            {{ $vendedor->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fecha">Fecha de venta</label>
                <input
                    type="date"
                    id="fecha"
                    name="fecha"
                    value="{{ old('fecha') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="monto">Monto de venta ($)</label>
                <input
                    type="number"
                    id="monto"
                    name="monto"
                    min="0.01"
                    step="0.01"
                    value="{{ old('monto') }}"
                    required
                >
            </div>

            <button class="btn" type="submit">
                Guardar venta
            </button>

            <button
                class="btn btn-secondary"
                type="button"
                onclick="window.location.href='{{ route('ventas.index') }}'"
            >
                Cancelar
            </button>
        </form>
    @endif
@endsection