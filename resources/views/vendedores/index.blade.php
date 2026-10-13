@extends('layouts.app')

@section('title', 'Vendedores | Sistema de Comisiones')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h2>Vendedores</h2>
            <p>Administra los vendedores registrados en el sistema.</p>
        </div>

        <a class="btn" href="/vendedores/create">
            + Nuevo vendedor
        </a>
    </div>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @if ($vendedores->isEmpty())
        <p class="warning">
            Aún no existen vendedores registrados.
        </p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendedores as $vendedor)
                    <tr>
                        <td>{{ $vendedor->nombre }}</td>
                        <td>{{ $vendedor->email }}</td>
                        <td>{{ $vendedor->telefono ?? 'No registrado' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection