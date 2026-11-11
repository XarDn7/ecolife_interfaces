<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome</title>
<link rel="icon" type="image/jpeg" href="{{ asset('images/Logo_Ecolife.jpg') }}">
<!-- 🔤 Fuente Elms Sans -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Elms+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
@vite(['resources/css/welcome.css'])
</head>
<body>
<header class="main-header">
    <div class="header-container">
         <div class="logo">
            <a href="/"><h1>ECOLIFE</h1></a>
        </div>

        <nav class="nav-menu">
            <a href="Empresa"></a>
            <a href="Servicios"></a>
            <a href="Noticias"></a>
            <a href="Preguntas Frecuentes"></a>
            <a href="Contacto"></a>
        </nav>
        
        <nav class="nav-buttons">
        @auth
            <a href="{{ url('/dashboard') }}" class="btn primary">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="btn">Log in</a>
            <a href="{{ route('register') }}" class="btn primary">Register</a>
        @endauth
        </nav>
    </div>
</header>
<!-- 🌿 HERO -->
<style>
    .hero {
        background: url("{{ asset('build/images/cubosreciclaje1.jpg') }}") no-repeat center center;
        background-size: cover;
        position: relative;
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        overflow: hidden;
    }
</style>
<section class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-container">
        <div class="hero-content">
            <h1 class="hero-title">Transformando residuos en oportunidades</h1>
            <p class="hero-text">Únete a la economía circular y contribuye a un futuro más sostenible.</p>
            <div class="hero-actions">
                <a href="{{ route('register') }}" class="btn primary">Comenzar ahora</a>
            </div>
        </div>
    </div>
</section>


<!-- ♻️ ¿QUÉ ES EL RECICLAJE? -->
<section class="info-section">
    <div class="container">
        <div class="info-block">
            <h2 class="info-title">¿Qué Es El Reciclaje?</h2>
            <p class="info-description">
                El reciclaje es el proceso mediante el cual los residuos se transforman en nuevos materiales o productos, 
                reduciendo el consumo de recursos naturales y minimizando el impacto ambiental.
            </p>
        </div>

        <div class="info-block">
            <h2 class="info-title">¿Por Qué Es Importante?</h2>
            <p class="info-description">
                Reciclar ayuda a disminuir la contaminación, conservar los recursos naturales y reducir la cantidad de 
                desechos que terminan en vertederos. Es una acción clave para combatir el cambio climático.
            </p>
        </div>
    </div>
</section>

<!-- ✨ BENEFICIOS -->
<section class="benefits-section">
    <div class="container">
        <h2 class="section-main-title">Beneficios Del Reciclaje</h2>
        
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">🌱</div> <h3>Cuidado ambiental</h3>
                <p>Reduce la contaminación del aire, agua y suelo.</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">⚡</div>
                <h3>Ahorro de energía</h3>
                <p>Menos energía en comparación con producir desde cero.</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">♻️</div>
                <h3>Reutilización</h3>
                <p>Extiende la vida útil de los materiales.</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">💰</div>
                <h3>Impacto económico</h3>
                <p>Genera empleo y nuevas oportunidades.</p>
            </div>
        </div>

          <div class="mission-vision-grid">
            <div class="mv-card">
              <div class="mv-image-container">
                <img src="{{ asset('build/images/hojas2.jpg') }}" alt="Misión Ecolife">
              </div>
            <div class="mv-content">
              <h3>Misión</h3>
            <p>Proveer soluciones integrales en la gestión de residuos sólidos y economía circular en la Gran Caracas.</p>
            </div>
            </div>
            <div class="mv-card">
              <div class="mv-image-container">
                <img src="{{ asset('build/images/tecnologiareciclada.jpg') }}" alt="Visión Ecolife">
              </div>
            <div class="mv-content">
              <h3>Visión</h3>
            <p>Consolidarse para el año 2030 como la empresa líder en innovación tecnológica aplicada al reciclaje en Venezuela.</p>
            </div>
          </div>
        </div>
    </div>
</section>
<footer>
    © 2026 - Economía Circular Venezuela
</footer>

</body>
</html>