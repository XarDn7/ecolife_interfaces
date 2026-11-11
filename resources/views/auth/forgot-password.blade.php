<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña - Ecolife</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/Logo_Ecolife.jpg') }}">
    @vite(['resources/css/forgot-password.css'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

    <style>
        /* Mantenemos el truco de la imagen para evitar líos de rutas */
        .auth-visual {
            flex: 1;
            position: relative;
            background: url("{{ asset('build/images/impresorareciclada1.jpg') }}") no-repeat center center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px;
            color: white;
        }
    </style>
</head>
<body>

<div class="auth-container">
    <div class="auth-visual">
        <div class="visual-overlay"></div>
        <div class="visual-content">
            <h2>¿Problemas para entrar?</h2>
            <p>No te preocupes. Restablecer tu contraseña es el primer paso para volver a cuidar el planeta.</p>
        </div>
    </div>

    <div class="auth-form-container">
        <div class="form-box">
            <div class="form-header">
                <a href="/" style="text-decoration: none;"><h1>ECOLIFE</h1></a>
                <p>Restablecer contraseña 🔐</p>
            </div>

            <div class="instruction-text">
                ¿Olvidaste tu contraseña? No hay problema. Solo dinos tu correo y te enviaremos un enlace para que elijas una nueva.
            </div>

            <x-auth-session-status class="status-message" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="input-group">
                    <label for="email">Correo Electrónico</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus placeholder="tu@ejemplo.com">
                    <x-input-error :messages="$errors->get('email')" class="error-msg" />
                </div>

                <div class="actions">
                    <button type="submit" class="btn-primary">
                        Enviar enlace de recuperación
                    </button>
                </div>

                <div class="auth-footer">
                    <a href="{{ route('login') }}">Volver al inicio de sesión</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>