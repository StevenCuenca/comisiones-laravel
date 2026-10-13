@extends('layouts.app')

@section('title', 'Nuevo vendedor | Sistema de Comisiones')

@section('content')
    <h2>Registrar vendedor</h2>
    <p>Ingresa la información del nuevo vendedor.</p>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/vendedores" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre completo</label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{ old('nombre') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input
                type="text"
                id="telefono"
                name="telefono"
                value="{{ old('telefono') }}"
            >
        </div>

        <button class="btn" type="submit">Guardar vendedor</button>

        <a class="btn btn-secondary" href="/vendedores">
            Cancelar
        </a>
    </form>
@endsection