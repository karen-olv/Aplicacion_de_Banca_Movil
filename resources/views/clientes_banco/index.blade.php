<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Clientes del Banco</title>
    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            max-width: 900px;
            margin: 30px auto;
        }

        h1 {
            margin-bottom: 10px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn-crear {
            display: inline-block;
            padding: 6px 10px;
            border: 1px solid #000;
            text-decoration: none;
            font-size: 14px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            min-width: 700px;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 8px 10px;
            text-align: left;
            font-size: 14px;
        }

        .acciones {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .empty-state {
            margin-top: 20px;
            font-style: italic;
            color: #444;
        }

        .alert-success {
            background: #d1fae5;
            border: 1px solid #10b981;
            color: #065f46;
            padding: 10px 12px;
            border-radius: 4px;
            font-size: 14px;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>

    <h1>Listado de clientes</h1>

    {{-- Mensaje de éxito opcional (por ejemplo después de crear) --}}
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="top-bar">
        <div>
            <strong>Total registrados:</strong>
            {{ $clientes->count() }}
        </div>

        {{-- Botón para crear nuevo cliente --}}
        <a class="btn-crear" href="{{ route('clientes_banco.create') }}">+ Nuevo cliente</a>
    </div>

    {{-- Tabla de clientes --}}
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre completo</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Número de cuenta</th>
                <th>Saldo</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @forelse($clientes as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->nombre }} {{ $c->apellido }}</td>
                    <td>{{ $c->email }}</td>
                    <td>{{ $c->telefono }}</td>
                    <td>{{ $c->numero_cuenta }}</td>
                    <td>${{ number_format($c->saldo, 2) }}</td>
                    <td>
                        <div class="acciones">
                            <a href="{{ route('clientes_banco.edit', $c->id) }}">Editar</a>

                            <form action="{{ route('clientes_banco.destroy', $c->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este cliente?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background:none;border:0;padding:0;cursor:pointer;color:#b91c1c;">
                                    Borrar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">
                        <div class="empty-state">
                            No hay clientes todavía. Registra el primero con “+ Nuevo cliente”.
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
