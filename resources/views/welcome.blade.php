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

<style>
    :root {
        --carbon-black: #1C2321;
        --seagrass: #66A182;
        --dusty-taupe: #957964;
        --snow: #FCF7F8;
        --yellow-green: #C0D461;
    }

    body {
        margin: 0;
        font-family: "Elms Sans", Arial, sans-serif;
        background-color: var(--seagrass);
        color: var(--carbon-black);
    }

    /* 🔥 HEADER PRO */
    .main-header {
        position: relative;
        background: var(--dusty-taupe);
        padding: 20px 30px;
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    /* CENTRAR TÍTULO PERFECTO */
    .logo {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
    }

    .logo h1 {
        margin: 0;
        font-size: 30px;
        letter-spacing: 2px;
        font-weight: 700;
    }

    /* BOTONES */
    .nav-buttons {
        display: flex;
        gap: 12px;
    }

    .btn {
        padding: 8px 16px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        border: 1px solid rgba(0,0,0,0.2);
        color: var(--carbon-black);
        background-color: var(--snow);
        transition: all 0.3s ease;
    }

    .btn.primary {
        background-color: var(--yellow-green);
        font-weight: bold;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }

    /* CONTENIDO */
    .container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
        padding: 50px;
    }

    .card {
        padding: 30px;
        border-radius: 12px;
        background-color: var(--snow);
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    h2 {
        margin-top: 0;
        font-weight: 600;
    }

    p {
        line-height: 1.6;
    }

    /* FOOTER */
    footer {
        background-color: var(--yellow-green);
        text-align: center;
        padding: 15px;
        color: var(--carbon-black);
        font-weight: bold;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .main-header {
            flex-direction: column;
            gap: 15px;
        }

        .logo {
            position: static;
            transform: none;
        }

        .container {
            grid-template-columns: 1fr;
            padding: 30px;
        }

    }
/* HERO */
.hero {
    text-align: center;
    padding: 80px 20px;
    background: linear-gradient(180deg, #6fa98c, #5f977b);
    color: white;
}

.hero h1 {
    font-size: 36px;
    margin-bottom: 10px;
}

.hero p {
    font-size: 18px;
    margin-bottom: 20px;
}

/* INFO SECTIONS */
.info-section {
    padding: 60px 40px;
    background: var(--snow);
    text-align: center;
}

.info-section.alt {
    background: #eef5f1;
}

.info-section h2 {
    margin-bottom: 15px;
}

/* BENEFITS */
.benefits {
    padding: 60px 40px;
    text-align: center;
}

.benefit-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-top: 30px;
}

.benefit-card {
    background: var(--snow);
    padding: 25px;
    border-radius: 12px;
    font-size: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.benefit-card:hover {
    transform: translateY(-5px);
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .benefit-grid {
        grid-template-columns: 1fr 1fr;
    }
}

</style>

</head>

<body>

<header class="main-header">
    
    <div class="logo">
        <h1>ECOLIFE</h1>
    </div>

    <nav class="nav-buttons">
        @auth
            <a href="{{ url('/dashboard') }}" class="btn primary">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="btn">Log in</a>
            <a href="{{ route('register') }}" class="btn primary">Register</a>
        @endauth
    </nav>

</header>

<!-- 🌿 HERO -->
<section class="hero">
    <h1>Transformando residuos en oportunidades</h1>
    <p>Únete a la economía circular y contribuye a un futuro más sostenible.</p>
    <a href="{{ route('register') }}" class="btn primary">Comenzar ahora</a>
</section>

<!-- ♻️ ¿QUÉ ES EL RECICLAJE? -->
<section class="info-section">
    <h2>¿Qué es el reciclaje?</h2>
    <p>
        El reciclaje es el proceso mediante el cual los residuos se transforman en nuevos materiales o productos,
        reduciendo el consumo de recursos naturales y minimizando el impacto ambiental.
    </p>
</section>

<!-- 🌎 IMPORTANCIA -->
<section class="info-section alt">
    <h2>¿Por qué es importante?</h2>
    <p>
        Reciclar ayuda a disminuir la contaminación, conservar los recursos naturales y reducir la cantidad de
        desechos que terminan en vertederos. Es una acción clave para combatir el cambio climático.
    </p>
</section>

<!-- ✨ BENEFICIOS -->
<section class="benefits">
    <h2>Beneficios del reciclaje</h2>

    <div class="benefit-grid">
        <div class="benefit-card">
            🌱
            <h3>Cuidado ambiental</h3>
            <p>Reduce la contaminación del aire, agua y suelo.</p>
        </div>

        <div class="benefit-card">
            ⚡
            <h3>Ahorro de energía</h3>
            <p>Menos energía en comparación con producir desde cero.</p>
        </div>

        <div class="benefit-card">
            ♻️
            <h3>Reutilización</h3>
            <p>Extiende la vida útil de los materiales.</p>
        </div>

        <div class="benefit-card">
            💰
            <h3>Impacto económico</h3>
            <p>Genera empleo y nuevas oportunidades.</p>
        </div>
    </div>
</section>

<section class="container">
    <div class="card">
        <h2>Misión</h2>
        <p>
            Proveer soluciones integrales en la gestión de residuos sólidos y economía circular en la Gran Caracas, mediante el uso de tecnologías limpias y procesos de transformación eficientes. 
            Nos comprometemos a reincorporar materiales aprovechables al ciclo productivo, fomentando una cultura de responsabilidad ambiental en la comunidad a través de incentivos estratégicos y educación sostenible.
        </p>
    </div>

    <div class="card">
        <h2>Visión</h2>
        <p>
            Consolidarse para el año 2030 como la empresa líder en innovación tecnológica aplicada al reciclaje en Venezuela, siendo referentes en la transformación de residuos en materia prima de alta pureza. 
            Aspiramos a expandir nuestra red de recolección inteligente a nivel nacional, impulsando un modelo económico donde el desecho sea visualizado como un recurso valioso para el desarrollo social y cultural.
        </p>
    </div>
</section>

<footer>
    © 2026 - Economía Circular Venezuela
</footer>

</body>
</html>