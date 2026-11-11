<x-warehouse_layout>
@push('css')
    <style>
        /* Mantenemos el fondo integrado del sistema EcoLife */
        body {
            background-image: url("{{ asset('build/images/cartonreciclado3.jpg') }}") !important;
            background-size: cover !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-attachment: fixed !important;
        }

        .pro-container {
            background: transparent; 
            padding: 20px;
            margin: 0 auto;
        }
        
        .clean-card,
        .warehouse-header {
            background-color: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(6px);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .warehouse-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        /* Estilo para los botones del submenú adaptados a la paleta */
        .sub-menu {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 25px;
            background-color: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(4px);
            padding: 12px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }

        .sub-menu button {
            padding: 10px 20px;
            border: none;
            background-color: var(--carbon-black, #334155);
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .sub-menu button:hover, .sub-menu button.btn-active {
            background-color: var(--seagrass, #2e7d32);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(46, 125, 50, 0.2);
        }

        .sub-section {
            display: none;
            animation: fadeIn 0.4s ease-in-out forwards;
        }

        .sub-section.active {
            display: block;
        }

        /* Estilización de los artículos y noticias (Cards internas) */
        .edu-card {
            background: rgba(255, 255, 255, 0.9) !important;
            padding: 20px;
            margin-bottom: 15px;
            border-left: 6px solid var(--seagrass, #2e7d32);
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.02);
            transition: transform 0.2s ease;
        }

        .edu-card:hover {
            transform: translateX(4px);
            background: #ffffff !important;
        }

        .edu-card h4 {
            color: var(--carbon-black, #1e293b);
            font-size: 1.1rem;
            margin-top: 0;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .edu-card p {
            color: #475569;
            font-size: 0.95rem;
            line-height: 1.5;
            margin-bottom: 12px;
        }

        .edu-link {
            color: var(--seagrass, #2e7d32);
            font-weight: 600;
            text-decoration: none;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .edu-link:hover {
            text-decoration: underline;
        }

        /* Contenedores de Imágenes */
        .image-container {
            display: none;
            margin-top: 20px;
            text-align: center;
        }

        .image-container.active {
            display: block;
        }

        .image-container img {
            width: 100%;
            max-width: 650px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            border: 4px solid white;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    @endpush

    @vite(['resources/css/warehouse.css'])

    <div class="pro-container" style="max-width: 850px;">

        {{-- ENCABEZADO CON BOTÓN DE RETORNO --}}
        <div class="warehouse-header">
            <div>
                <span class="title-green" style="color: var(--black, #000000); font-weight: 800;">ESPACIO DE PUBLICIDAD Y DISEÑO</span>
                <h2 class="subtitle" style="margin: 0; font-size: 1.4rem; font-weight: 700;">Espacio Educativo y Publicitario</h2>
            </div>
            <div>
                <a href="{{ url('/dashboard') }}" class="btn-atajo btn-salida" style="display: flex; align-items: center; gap: 6px; font-size: 0.9rem; padding: 8px 14px; width: max-content; text-decoration: none; border-radius: 8px;">
                    ⬅️ Dashboard
                </a>
            </div>
        </div>

        {{-- SUBMENÚ INTERACTIVO --}}
        <div class="sub-menu">
            <button id="btn-clasificacion" class="btn-menu" onclick="showSubSection('clasificacion', 'imgClasificacion', this)">Clasificación</button>
            <button id="btn-procesamiento" class="btn-menu" onclick="showSubSection('procesamiento', 'imgProcesamiento', this)">Procesamiento</button>
            <button id="btn-distribucion" class="btn-menu" onclick="showSubSection('distribucion', 'imgDistribucion', this)">Distribución</button>
            <button id="btn-articulos" class="btn-menu" onclick="showSubSection('articulos', null, this)">Artículos</button>
            <button id="btn-noticias" class="btn-menu" onclick="showSubSection('noticias', null, this)">Noticias</button>
        </div>

        {{-- SECCIONES DE CONTENIDO GENERAL --}}
        <div class="clean-card">
            
            <div id="clasificacion" class="sub-section">
                <h3 style="color: var(--seagrass); font-weight: 700; margin-bottom: 15px;">Clasificación de Residuos</h3>
                <div class="edu-card">
                    <h4>¿Cómo se clasifica correctamente?</h4>
                    <p>Los materiales se separan en categorías como orgánico, plástico, vidrio, papel y metales utilizando tecnología y trabajo manual especializado para asegurar un alto estándar de pureza en el reciclaje.</p>
                </div>
                <div id="imgClasificacion" class="image-container">
                    <img src="https://contenedoressatur.com/wp-content/uploads/2024/08/colores-reciclaje-1024x656.jpg" alt="Clasificación de residuos">
                </div>
            </div>

            <div id="procesamiento" class="sub-section">
                <h3 style="color: var(--seagrass); font-weight: 700; margin-bottom: 15px;">Procesamiento Industrial</h3>
                <div class="edu-card">
                    <h4>¿Cómo se procesan los residuos?</h4>
                    <p>Los residuos recuperados se limpian de impurezas, se trituran en hojuelas o pellets y se preparan bajo estrictas normativas para su reutilización directa en nuevas cadenas productivas.</p>
                </div>
                <div id="imgProcesamiento" class="image-container">
                    <img src="{{ asset('build/images/procesamiento.png') }}" alt="Procesamiento">
                </div>
            </div>



            <div id="distribucion" class="sub-section">
                <h3 style="color: var(--seagrass); font-weight: 700; margin-bottom: 15px;">Distribución y Logística Verde</h3>
                <div class="edu-card">
                    <h4>¿Qué se hace con los residuos procesados?</h4>
                    <p>Los materiales reciclados se distribuyen estratégicamente y se venden a corporaciones aliadas, transformándose en materia prima ecológica para la fabricación de nuevos productos sustentables.</p>
                </div>
                <div id="imgDistribucion" class="image-container">
                    <img src="{{ asset('build/images/distribucionylogistica.png') }}" alt="Clasificación de distribución">
                </div>
            </div>

            <div id="articulos" class="sub-section">
                <h3 style="color: var(--seagrass); font-weight: 700; margin-bottom: 15px;">Artículos Científicos y de Opinión</h3>
                
                <div class="edu-card">
                    <h4>Buenas prácticas medioambientales de las empresas españolas</h4>
                    <p>Este catálogo, elaborado por el departamento de Industria, Energía, Medio Ambiente y Clima, refleja el esfuerzo continuo de las empresas por avanzar en la transición ecológica y energética, alineándose con la Agenda 2030. Recopila más de 200 iniciativas de éxito.</p>
                    <a href="https://www.ceoe.es/es/buenas-practicas-en-economia-circular-de-las-empresas-espanolas" target="_blank" class="edu-link">Leer más ↗️</a>
                </div>
            
                <div class="edu-card">
                    <h4>Lentes, materos y muebles de desechos: así rueda el reciclaje en Venezuela</h4>
                    <p>Desde jóvenes emprendedores que transforman basura en ideas de diseño hasta empresas privadas que incentivan de manera autónoma la separación de desechos y pedalean firmes hacia la sostenibilidad.</p>
                    <a href="https://elpais.com/america-futura/2025-10-18/lentes-materos-y-muebles-de-desechos-asi-rueda-el-reciclaje-en-venezuela.html" target="_blank" class="edu-link">Leer más ↗️</a>
                </div>

                <div class="edu-card">
                    <h4>Productos desarrollados con plástico reciclado presentaron tesistas de Ingeniería Industrial UCAB</h4>
                    <p>El Aula Abierta UCAB Recicla es un espacio dentro del campus Montalbán que cuenta con una planta funcional en la que botellas plásticas PET desechadas son reconvertidas tecnológicamente en nuevos productos útiles para la sociedad.</p>
                    <a href="https://elucabista.com/2025/07/30/productos-desarrollados-con-plastico-reciclado-presentaron-tesistas-ingenieria-industrial-ucab/" target="_blank" class="edu-link">Leer más ↗️</a>
                </div>

                <div class="edu-card">
                    <h4>Venezuela recicla solo 5% de las 28 mil toneladas de basura que genera a diario</h4>
                    <p>Caracas produce entre 400 y 500 mil toneladas de basura diarias. Si se lograra recuperar eficientemente el 80% de los residuos, estos se integrarían a un circuito económico sustentable masivo de producción nacional.</p>
                    <a href="https://correodelcaroni.com/sociedad/ambiente/venezuela-recicla-solo-5-de-las-28-mil-toneladas-de-basura-que-genera-a-diario/" target="_blank" class="edu-link">Leer más ↗️</a>
                </div>
            </div>
          
            <div id="noticias" class="sub-section">
                <h3 style="color: var(--seagrass); font-weight: 700; margin-bottom: 15px;">Noticias de Actualidad</h3>
                
                <div class="edu-card" style="border-left-color: var(--yellow-green, #84cc16);">
                    <h4>📰 EcoLife expande sus rutas de recolección</h4>
                    <p>¡Buenas noticias! Nuestro sistema añade nuevos sectores y puntos fijos inteligentes en la hoja de ruta urbana para aumentar el volumen de captación diario.</p>
                </div>

                <div class="edu-card">
                    <h4>Samsung lleva su servicio de reciclaje a las Islas Galápagos</h4>
                    <p>A través de sus puntos de depósito ecológico "Eco Box", la empresa tecnológica expande sus infraestructuras de recolección hacia zonas remotas y de alto resguardo natural en América Latina.</p>
                    <a href="https://news.samsung.com/ar/samsung-lleva-su-servicio-de-reciclaje-a-las-islas-galapagos-uno-de-los-mayores-paraisos-ecologicos-de-america-latina" target="_blank" class="edu-link">Leer más ↗️</a>
                </div>
              
                <div class="edu-card">
                    <h4>El 85,5% de los españoles asegura reciclar papel y cartón habitualmente</h4>
                    <p>El estudio del Foro del Papel resalta la madurez y la consolidación social de los hábitos domésticos de separación en España, alcanzando un volumen anual reciclado de 5,2 millones de toneladas.</p>
                    <a href="https://www.residuosprofesional.com/espanoles-afirman-reciclar-papel-y-carton-de-forma-habitual/" target="_blank" class="edu-link">Leer más ↗️</a>
                </div>

                <div class="edu-card">
                    <h4>Cinco tecnologías que están reduciendo la basura en Colombia</h4>
                    <p>Exploración de sistemas automatizados avanzados y sensores ópticos de clasificación que buscan elevar las tasas operacionales de reciclaje industrial en territorio colombiano.</p>
                    <a href="https://www.ondasdelporvenir.com/dia-mundial-del-reciclaje-cinco-tecnologias-que-ya-estan-cambiando-la-forma-de-reciclar-y-reduciendo-la-basura-en-colombia/" target="_blank" class="edu-link">Leer más ↗️</a>
                </div>
            </div>

        </div>
    </div>

    {{-- LÓGICA DE INTERACTIVIDAD REVISADA --}}
    <script>
        function showSubSection(id, imageId = null, buttonElement = null) {
            // Ocultar todas las subsecciones de texto
            const subs = document.querySelectorAll('.sub-section');
            subs.forEach(s => s.classList.remove('active'));

            // Ocultar todos los contenedores de imágenes
            const images = document.querySelectorAll('.image-container');
            images.forEach(img => img.classList.remove('active'));

            // Remover el estado activo de todos los botones del submenú
            const buttons = document.querySelectorAll('.btn-menu');
            buttons.forEach(btn => btn.classList.remove('btn-active'));

            // Activar los elementos seleccionados por el usuario
            document.getElementById(id).classList.add('active');
            
            if (imageId) {
                document.getElementById(imageId).classList.add('active');
            }

            if (buttonElement) {
                buttonElement.classList.add('btn-active');
            }
        }

        // Dejar activa por defecto la primera sección al entrar al módulo
        document.addEventListener('DOMContentLoaded', function() {
            const btnClasif = document.getElementById('btn-clasificacion');
            showSubSection('clasificacion', 'imgClasificacion', btnClasif);
        });
    </script>
</x-warehouse_layout>