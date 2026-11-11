<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Ecolife</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/Logo_Ecolife.jpg') }}">
    
    @vite(['resources/css/login.css'])
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

    <style>
        /* Estilos específicos para la imagen de fondo (Truco híbrido) */
        .auth-visual {
            flex: 1;
            position: relative;
            /* Aquí podrías usar otra imagen como 'cubosreciclaje1.jpg' para variar */
            background: url("{{ asset('build/images/periodicoreciclado.jpg') }}") no-repeat center center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px;
            color: white;
        }

        /* Nota: El resto de los estilos irán en login.css, 
           pero te los dejo aquí abajo para que los copies y separes fácilmente.
        */
    </style>
</head>
<body>

<div class="auth-container">
    <div class="auth-visual">
        <div class="visual-overlay"></div>
        <div class="visual-content">
            <h2>Bienvenido de nuevo</h2>
            <p>Accede a tu cuenta para seguir transformando residuos en oportunidades.</p>
        </div>
    </div>

    <div class="auth-form-container">
        <div class="form-box">
            <div class="form-header">
                <a href="/" style="text-decoration: none;"><h1>ECOLIFE</h1></a>
                <p>Accede a tu cuenta</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-group">
                    <label for="email">Correo Electrónico</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus placeholder="tu@ejemplo.com">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="input-group">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" name="password" required placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="remember-me">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" name="remember">
                        <span class="ms-2 text-sm">Recordarme</span>
                    </label>
                </div>

                <div class="actions">
                    <button type="submit" class="btn-primary">
                        Iniciar Sesión
                    </button>
                </div>

                <div class="auth-footer">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-pass">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                    <div class="mt-4">
                        ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>