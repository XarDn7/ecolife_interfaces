<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Ecolife</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/Logo_Ecolife.jpg') }}">
    @vite(['resources/css/register.css'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
</head>
<body>
<style>      
    .auth-visual {
        flex: 1;
        position: relative;
        background: url("{{ asset('build/images/recolectar.jpg') }}") no-repeat center center;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 50px;
        color: white;
    }
</style>
<div class="auth-container">
    <div class="auth-visual">
        <div class="visual-overlay"></div>
        <div class="visual-content">
            <h2>Únete a la Revolución Verde</h2>
            <p>Tu participación en Ecolife ayuda a monitorear y optimizar la economía circular en Venezuela.</p>
        </div>
    </div>

    <div class="auth-form-container">
        <div class="form-box">
            <div class="form-header">
                <a href="/" style="text-decoration: none;"><h1>ECOLIFE</h1></a>
                <p>Crea tu cuenta para comenzar</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="input-group">
                    <label for="name">Nombre Completo</label>
                    <input id="name" type="text" name="name" required autofocus placeholder="Ej. Juan Pérez">
                </div>

                <div class="input-group">
                    <label for="email">Correo Electrónico</label>
                    <input id="email" type="email" name="email" required placeholder="tu@ejemplo.com">
                </div>

                <div class="input-group">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" name="password" required placeholder="••••••••">
                </div>

                <div class="input-group">
                    <label for="password_confirmation">Confirmar Contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="••••••••">
                </div>

                <button type="submit" class="btn-primary">Registrarse</button>
            </form>

            <div class="auth-footer">
                ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>