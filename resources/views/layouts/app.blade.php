
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Comisiones')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f6fb;
            color: #1f2937;
        }

        header {
            background: linear-gradient(135deg, #1e3a8a, #2563eb);
            color: white;
            padding: 22px 8%;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .15);
        }

        header h1 {
            margin: 0 0 12px;
            font-size: 24px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        main {
            max-width: 1050px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 28px;
            box-shadow: 0 5px 18px rgba(15, 23, 42, .10);
        }

        h2 {
            margin-top: 0;
            color: #1e3a8a;
        }

        .btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 7px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #64748b;
        }

        .btn-secondary:hover {
            background: #475569;
        }

        input, select {
            width: 100%;
            margin-top: 6px;
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 14px;
        }

        label {
            font-weight: bold;
            color: #334155;
        }

        .form-group {
            margin-bottom: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: #dbeafe;
            color: #1e3a8a;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }

        tr:hover {
            background: #f8fafc;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 7px;
        }

        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px;
            border-radius: 7px;
        }

        .warning {
            background: #fef3c7;
            color: #92400e;
            padding: 12px;
            border-radius: 7px;
        }

        .result {
            font-size: 25px;
            color: #15803d;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <h1>Sistema de Comisiones</h1>

        <nav>
            <a href="{{ route('vendedores.index') }}">Vendedores</a>
            <a href="{{ route('ventas.index') }}">Ventas</a>
            <a href="{{ route('comisiones.index') }}">Calcular comisión</a>
        </nav>
    </header>

    <main>
        <div class="card">
            @yield('content')
        </div>
    </main>
</body>
</html>