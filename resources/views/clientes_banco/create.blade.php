<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nuevo cliente</title>
</head>
<body>
    <h1>Registrar nuevo cliente</h1>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div style="color:red; margin-bottom:15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clientes_banco.store') }}" method="POST">
        @csrf

        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="{{ old('nombre') }}" required>
        <br><br>

        <label>Apellido:</label><br>
        <input type="text" name="apellido" value="{{ old('apellido') }}" required>
        <br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required>
        <br><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono" value="{{ old('telefono') }}" required>
        <br><br>

        <label>Número de cuenta:</label><br>
        <input type="text" name="numero_cuenta" value="{{ old('numero_cuenta') }}" required>
        <br><br>

        <label>Saldo inicial:</label><br>
        <input type="number" step="0.01" name="saldo" value="{{ old('saldo') }}" required>
        <br><br>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="{{ route('clientes_banco.index') }}">← Volver al listado</a>
</body>
</html>
