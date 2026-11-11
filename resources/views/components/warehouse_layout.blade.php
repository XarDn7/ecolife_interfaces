<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecolife - Gestión de Almacén</title>

    {{-- Google Fonts: Cambiamos Poppins por Figtree para unificar con el Dashboard --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- CSS DEL ALMACÉN (Base y Pro) --}}
    <link rel="stylesheet" href="{{ asset('css/warehouse.css') }}">
    <link rel="stylesheet" href="{{ asset('css/warehouse_pro.css') }}">

    {{-- Permite inyectar estilos específicos desde la vista --}}
    @stack('css')
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="warehouse-nav" style="background-color: #4a7c59; padding: 15px 40px; color: white; font-family: 'Figtree', sans-serif;">
        <strong style="font-size: 20px; letter-spacing: 1px;">ECOLIFE</strong>
    </nav>

    {{-- CONTENIDO --}}
    <main>
        {{ $slot }}
    </main>

    {{-- JS --}}
    @stack('js')

</body>
</html>