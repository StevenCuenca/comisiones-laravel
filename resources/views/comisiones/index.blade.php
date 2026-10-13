@extends('layouts.app')

@section('title', 'Calcular comisión | Sistema de Comisiones')

@section('content')
    <h2>Calcular comisión</h2>
    <p>Selecciona un vendedor y el rango de fechas que deseas consultar.</p>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('comisiones.calcular') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="vendedor_id">Vendedor</label>
            <select id="vendedor_id" name="vendedor_id" required>
                <option value="">Seleccione un vendedor</option>

                @foreach ($vendedores as $vendedor)
                    <option value="{{ $vendedor->id }}"
                        @selected(old('vendedor_id') == $vendedor->id)>
                        {{ $vendedor->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fecha_inicio">Fecha de inicio</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio"
                   value="{{ old('fecha_inicio') }}" required>
        </div>

        <div class="form-group">
            <label for="fecha_fin">Fecha de fin</label>
            <input type="date" id="fecha_fin" name="fecha_fin"
                   value="{{ old('fecha_fin') }}" required>
        </div>

        <button class="btn" type="submit">Calcular comisión</button>
    </form>
@endsection