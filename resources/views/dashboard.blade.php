<x-app-layout>

<style>
    :root {
        --carbon-black: #1C2321;
        --seagrass: #66A182;
        --dusty-taupe: #957964;
        --snow: #FCF7F8;
        --yellow-green: #C0D461;
        
        /* Nuevas variantes para mejorar contrastes y alertas */
        --emerald-vibrant: #2e7d32;
        --amber-alert: #d97706;
        --ocean-blue: #0284c7;
    }

    body {
        font-family: "Elms Sans", Arial, sans-serif;
        background: linear-gradient(180deg, #6fa98c, #5f977b) !important;
        background-attachment: fixed !important;
    }

    .dashboard-container {
        padding: 40px;
    }

    .dashboard-title {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 25px;
        color: #000000;
        text-shadow: 0 2px 4px rgba(0,0,0,0.15);
        letter-spacing: 0.5px;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    /* Tarjeta Base */
    .card {
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(8px);
        padding: 25px;
        border-radius: 14px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(255, 255, 255, 0.4);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
        box-sizing: border-box;
    }

    /* Variaciones de color en bordes para diferenciar los tipos de tarjetas */
    .card-metric { border-left: 6px solid var(--ocean-blue); }
    .card-impact { border-left: 6px solid var(--amber-alert); }
    .card-points { border-left: 6px solid var(--yellow-green); }
    
    /* Las tarjetas con enlaces (roles activos) reciben un color verde corporativo fuerte */
    .card-role { 
        border-left: 6px solid var(--emerald-vibrant); 
        background: rgba(255, 255, 255, 0.97) !important;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }

    .card h3 {
        margin: 0 0 12px 0;
        color: var(--carbon-black);
        font-size: 1.2rem;
        font-weight: 700;
    }

    .card p {
        font-size: 14px;
        color: #475569;
        margin-bottom: 0;
        line-height: 1.4;
    }

    .highlight {
        font-size: 32px;
        font-weight: 800;
        margin: 8px 0;
        line-height: 1;
    }

    /* Botones de acción simulados dentro de los enlaces de roles */
    .btn-action-indicator {
        margin-top: 15px;
        background-color: var(--carbon-black);
        color: white;
        text-align: center;
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 600;
        transition: background 0.2s ease;
    }

    .card-role:hover .btn-action-indicator {
        background-color: var(--emerald-vibrant);
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
        Panel de Gestión EcoLife
    </div>

    <div class="grid">

        <div class="card card-metric">
            <div>
                <h3>Residuos reciclados</h3>
                <p class="highlight" style="color: var(--ocean-blue);">120 kg</p>
            </div>
            <p>Material procesado en tu comunidad</p>
        </div>

        <div class="card card-impact">
            <div>
                <h3>Impacto ambiental</h3>
                <p class="highlight" style="color: var(--amber-alert);">-35%</p>
            </div>
            <p>Reducción estimada de contaminación</p>
        </div>

        <div class="card card-points">
            <div>
                <h3>Puntos ecológicos</h3>
                <p class="highlight" style="color: #65a30d;">850 pts</p>
            </div>
            <p>Recompensas por reciclar</p>
        </div>

        <a href="{{ url('/collector') }}" class="card-link" style="text-decoration: none; color: inherit; display: block;">
            <div class="card card-role">
                <div>
                    <h3>Recolecciones</h3>
                    <p class="highlight" style="color: var(--emerald-vibrant);">12</p>
                    <p>Servicios realizados este mes</p>
                </div>
                <div class="btn-action-indicator">Gestionar Rutas ➡️</div>
            </div>
        </a>

        <div class="card" style="border-left: 6px solid #64748b;">
            <div>
                <h3>Actividad</h3>
                <p style="font-size: 15px; margin-top: 10px;">Monitorea tu progreso diario, estadísticas de recolección y contribución ambiental en tiempo real.</p>
            </div>
        </div>

        <a href="{{ route('warehouse.index') }}" class="card-link" style="text-decoration: none; color: inherit; display: block;">
            <div class="card card-role">
                <div>
                    <h3>Gestión de Almacén</h3>
                    <p class="highlight" style="color: var(--emerald-vibrant);">5</p> 
                    <p>Categorías de materiales en stock</p>
                </div>
                <div class="btn-action-indicator">Ver Inventario </div>
            </div>
        </a>

        <a href="{{ route('collector.educativo') }}" class="card-link" style="text-decoration: none; color: inherit; display: block;">
            <div class="card card-role">
                <div>
                    <h3>Publicidad y Diseño</h3>
                    <p class="highlight" style="color: var(--emerald-vibrant);">Eco</p>
                    <p>Descubre cómo clasificamos, procesamos y distribuimos los materiales reciclables para cuidar nuestro entorno.</p>
                </div>
                <div class="btn-action-indicator">Más Información</div>
            </div>
        </a>

        <div class="card" style="background: rgba(255,255,255,0.6) !important; border-left: 6px dashed #cbd5e1;">
            <div>
                <h3 style="color: #64748b;">⚙️ Próximamente</h3>
                <p style="color: #64748b;">Más funcionalidades operativas e integraciones en desarrollo para el sistema...</p>
            </div>
        </div>
        
    </div>
</div>
</x-app-layout>