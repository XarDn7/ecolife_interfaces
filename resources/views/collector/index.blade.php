<x-warehouse_layout>
@push('css')
    <style>
        /* La imagen ahora es dueña absoluta de todo el fondo del navegador */
        body {
            background-image: url("{{ asset('build/images/camionrecicla2.jpg') }}") !important;
            background-size: cover !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-attachment: fixed !important;
        }

        .pro-container {
            /* Dejamos el contenedor limpio de fondo para que sea transparente 
               y deje ver la imagen que está en el body */
            background: transparent; 
            padding: 20px;
        }
        
        .clean-card,
        .warehouse-header {
            background-color: rgba(255, 255, 255, 0.93) !important;
            backdrop-filter: blur(4px);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .section-title-overlay {
            color: var(--carbon-black); 
            margin-bottom: 15px; 
            font-weight: 700;
            background-color: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(2px);
            padding: 6px 12px;
            border-radius: 8px;
            width: max-content;
            display: inline-block;
        }
    </style>
    @endpush
    @vite(['resources/css/warehouse.css'])

    <div class="pro-container" style="max-width: 800px;">

        {{-- ENCABEZADO --}}
        <div class="warehouse-header">
            <div>
                <span class="title-green" style="color: var(--black);">RUTA DE RECOLECCIÓN</span>
                <h2 class="subtitle" style="margin: 0; font-size: 1.3rem;">Panel del Operario de Ruta</h2>
            </div>
            <div style="display: flex; align-items: center; gap: 15px;">
                <a href="{{ url('/dashboard') }}" class="btn-atajo btn-salida" style="display: flex; align-items: center; gap: 6px; font-size: 0.9rem; padding: 6px 12px; width: max-content;">
                    ⬅️ Dashboard
                </a>
            </div>
        </div>
        {{-- Alerta de éxito cuando se cierra un ticket --}}
        @if(session('success'))
            <div style="background-color: #d1fae5; color: #065f46; padding: 12px; border-radius: 10px; margin-bottom: 20px; font-weight: 600;">
                {{ session('success') }}
            </div>
        @endif

        {{-- SECCIÓN 1: CONSULTAR HOJA DE RUTA --}}
        <h3 class="section-title-overlay">Puntos Pendientes Hoy</h3>
        
        @foreach($tickets as $ticket)
        <div class="clean-card" style="border-left: 6px solid var(--seagrass); margin-bottom: 20px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 10px;">
                <div>
                    <h4 style="font-size: 1.15rem; color: var(--carbon-black); margin-bottom: 5px;">{{ $ticket['lugar'] }}</h4>
                    <p style="color: #000000; font-size: 0.9rem; margin-bottom: 3px;"><strong>Dirección:</strong> {{ $ticket['direccion'] }}</p>
                    <p style="color: #000000; font-size: 0.9rem;"><strong>Material Estimado:</strong> {{ $ticket['material_estimado'] }}</p>
                </div>
                <span class="stock-badge" style="background: #fef3c7; color: #d97706; border: 2px solid #fde68a;">
                    {{ $ticket['estado'] }}
                </span>
            </div>
            <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 15px 0;">
            <div style="display: flex; justify-content: flex-end;">
                <button class="btn-atajo btn-entrada" onclick="abrirCierreTicket({{ $ticket['id'] }}, '{{ $ticket['lugar'] }}')" style="font-size: 0.9rem; padding: 8px 16px;">
                    ✅ Cerrar Ticket
                </button>
            </div>
        </div>
        @endforeach

{{-- SECCIÓN 2: FORMULARIO EMERGENTE / CIERRE DE TICKET --}}
        <div id="seccion-cierre" class="clean-card" style="display: none; border: 3px solid var(--yellow-green); background-color: #fdfdfd; margin-top: 40px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h3 style="color: var(--carbon-black); font-weight: 700; margin: 0;">
                    Formulario de Cierre: <span id="ticket-lugar" style="color: var(--seagrass);">-</span>
                </h3>
                <button onclick="cerrarFormulario()" style="background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #94a3b8;">&times;</button>
            </div>

            {{-- UN SOLO FORMULARIO: Adaptado con la cuadrícula original y los campos necesarios --}}
            <form action="{{ route('collector.close') }}" method="POST" class="pro-form-group" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
                @csrf
                
                {{-- Campos ocultos manipulados dinámicamente por JavaScript --}}
                <input type="hidden" name="ticket_id" id="ticket_id_input">
                <input type="hidden" name="source_destination" id="source_destination_input">

                <div>
                    <label style="display: block; font-size: 14px; color: #475569; margin-bottom: 5px; font-weight: 600;">Material Recolectado Real</label>
                    <select name="material_id" required style="width: 100%;">
                        <option value="" disabled selected>Seleccione material...</option>
                        @foreach($materials as $material)
                            <option value="{{ $material->id }}">{{ $material->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label style="display: block; font-size: 14px; color: #475569; margin-bottom: 5px; font-weight: 600;">Peso Registrado (kg / unidades)</label>
                    <input type="number" name="quantity" step="0.01" min="0.01" placeholder="Ej: 25.5" required style="width: 100%;">
                </div>

                <div style="grid-column: 1 / -1; display: flex; justify-content: flex-end; gap: 10px; margin-top: 10px;">
                    <button type="button" onclick="cerrarFormulario()" class="btn-atajo btn-salida" style="padding: 10px 20px;">Cancelar</button>
                    <button type="submit" class="btn-atajo btn-entrada" style="padding: 10px 20px;">Confirmar Cierre</button>
                </div>
            </form>
        </div>

    </div>

    {{-- INTERACTIVIDAD RÁPIDA DE LA INTERFAZ --}}
    <script>
        function abrirCierreTicket(id, lugar) {
            // Asignamos el ID al input oculto
            document.getElementById('ticket_id_input').value = id;
            
            // ASIGNACIÓN CLAVE: Pasamos el nombre del lugar al input oculto para source_destination
            document.getElementById('source_destination_input').value = lugar;
            
            // Cambiamos el texto visual de la cabecera del formulario
            document.getElementById('ticket-lugar').innerText = lugar;
            
            // Mostramos la sección de forma fluida
            const seccion = document.getElementById('seccion-cierre');
            seccion.style.display = 'block';
            seccion.scrollIntoView({ behavior: 'smooth' });
        }

        function cerrarFormulario() {
            document.getElementById('seccion-cierre').style.display = 'none';
        }
    </script>
</x-warehouse_layout>   