<x-guest-layout>

<style>
    :root {
        --carbon-black: #1C2321;
        --seagrass: #66A182;
        --dusty-taupe: #957964;
        --snow: #FCF7F8;
        --yellow-green: #C0D461;
    }

    body {
        font-family: "Elms Sans", Arial, sans-serif;
        background: linear-gradient(180deg, #6fa98c, #5f977b);
    }

    .register-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .register-card {
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(8px);
        padding: 40px;
        border-radius: 16px;
        width: 100%;
        max-width: 420px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .register-title {
        text-align: center;
        font-size: 26px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .register-subtitle {
        text-align: center;
        font-size: 14px;
        margin-bottom: 25px;
        opacity: 0.8;
    }

    input {
        border-radius: 8px !important;
        border: 1px solid #ccc !important;
        padding: 10px !important;
    }

    input:focus {
        border-color: var(--yellow-green) !important;
        box-shadow: 0 0 0 2px rgba(192,212,97,0.3) !important;
    }

    .primary-btn {
        background: linear-gradient(135deg, var(--yellow-green), #a8c944);
        border: none;
        color: var(--carbon-black);
        font-weight: bold;
        padding: 10px 15px;
        border-radius: 8px;
        transition: 0.3s;
    }

    .primary-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .login-link {
        font-size: 13px;
        color: #555;
    }

</style>

<div class="register-container">

    <div class="register-card">

        <div class="register-title">Crear cuenta</div>
        <div class="register-subtitle">Únete a ECOLIFE y transforma el mundo ♻️</div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" class="block mt-1 w-full"
                    type="text" name="name"
                    :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Correo')" />
                <x-text-input id="email" class="block mt-1 w-full"
                    type="email" name="email"
                    :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" />
                <x-text-input id="password" class="block mt-1 w-full"
                    type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                    type="password" name="password_confirmation" required />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between mt-6">

                <a class="login-link" href="{{ route('login') }}">
                    ¿Ya tienes cuenta?
                </a>

                <button type="submit" class="primary-btn">
                    Registrarse
                </button>

            </div>
        </form>

    </div>

</div>

</x-guest-layout>