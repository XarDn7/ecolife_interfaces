<x-app-layout>

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

    .dashboard-container {
        padding: 40px;
    }

    .dashboard-title {
        font-size: 26px;
        font-weight: 700;
        margin-bottom: 25px;
        color: black;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .card {
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(8px);
        padding: 25px;
        border-radius: 14px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        transition: 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card h3 {
        margin: 0 0 10px 0;
    }

    .card p {
        font-size: 14px;
        opacity: 0.8;
    }

    .highlight {
        font-size: 28px;
        font-weight: bold;
        color: var(--seagrass);
    }

    /* RESPONSIVE */
    @media (max-width: 900px) {
        .grid {
            grid-template-columns: 1fr;
        }
    }

</style>

<div class="dashboard-container">

    <div class="dashboard-title">
        🌿 Bienvenido a ECOLIFE
    </div>

    <div class="grid">

        <!-- CARD 1 -->
        <div class="card">
            <h3>♻️ Residuos reciclados</h3>
            <p class="highlight">120 kg</p>
            <p>Material procesado en tu comunidad</p>
        </div>

        <!-- CARD 2 -->
        <div class="card">
            <h3>🌱 Impacto ambiental</h3>
            <p class="highlight">-35%</p>
            <p>Reducción estimada de contaminación</p>
        </div>

        <!-- CARD 3 -->
        <div class="card">
            <h3>🏆 Puntos ecológicos</h3>
            <p class="highlight">850 pts</p>
            <p>Recompensas por reciclar</p>
        </div>

        <!-- CARD 4 -->
        <div class="card">
            <h3>🚛 Recolecciones</h3>
            <p class="highlight">12</p>
            <p>Servicios realizados este mes</p>
        </div>

        <!-- CARD 5 -->
        <div class="card">
            <h3>📊 Actividad</h3>
            <p>Monitorea tu progreso y contribución ambiental.</p>
        </div>

        <!-- CARD 6 -->
        <div class="card">
            <h3>⚙️ Próximamente</h3>
            <p>Más funcionalidades en desarrollo...</p>
        </div>

    </div>

</div>

</x-app-layout>