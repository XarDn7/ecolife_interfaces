<x-warehouse_layout>
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/warehouse_pro.css') }}">
        @vite(['resources/css/warehouse.css'])
    @endpush

{{-- Encabezado Principal Orientado Izquierda-Derecha --}}
<div class="warehouse-header">
    {{-- Bloque Izquierdo: Botón de Retorno --}}
<div>
    <a href="{{ url('/dashboard') }}" class="btn-atajo btn-salida" style="display: flex; align-items: center; gap: 6px; font-size: 0.9rem; padding: 6px 12px; width: max-content;">
        ⬅️ Dashboard
    </a>
</div>
    {{-- Bloque Derecho: Información de la Sede y Título del Panel --}}
    <div style="text-align: right;">
        <h2 class="subtitle" style="margin: 0; font-size: 1.4rem; font-weight: 700; color: var(--carbon-black);">
            Sede Central
        </h2>
    </div>
</div>

    <div class="pro-container">
        {{-- Encabezado Principal --}}
        <div class="warehouse-header">
            <div style="text-align: center;">
                <h2 style="color: #000000; font-size: 18px; margin: 5px 0 0 0;">Panel de Gestión de Jefe de Almacén</h2>
            </div>
        </div>

        {{-- Tabla de Materiales Centrada --}}
        <div class="clean-card">
            <table class="pro-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Material Reciclable</th>
                        <th>Descripción</th>
                        <th>Stock Actual</th>
                        <th>Operaciones Rápidas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materials as $material)
                    <tr>
                        <td style="color: #000000; font-weight: bold;">#{{ $material->id }}</td>
                        <td>
                            <span style="font-weight: 600; color: #1e293b; font-size: 1.1rem;">
                                {{ $material->name }}
                            </span>
                        </td>
                        <td style="color: #000000; font-size: 14px;">{{ $material->description }}</td>
                        <td>
                            <span class="stock-badge">
                                <strong>{{ number_format($material->stock_actual, 2, ',', '.') }}</strong>
                                <small>{{ $material->unit }}</small>
                            </span>
                        </td>
                        <td>
                            {{-- Botones de atajo rápido --}}
                            <button class="btn-atajo btn-entrada" onclick="prellenarFormulario({{ $material->id }}, 'entrada')">+</button>
                            <button class="btn-atajo btn-salida" onclick="prellenarFormulario({{ $material->id }}, 'salida')">-</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Formulario de Registro --}}
        <div id="registro-movimiento" class="clean-card">
            <h3 style="color: #4a7c59; margin-bottom: 20px; text-align: center;">Registrar Entrada o Salida</h3>
            
            <form action="{{ route('warehouse.store') }}" method="POST" class="pro-form-group">
                @csrf
                <div>
                    <label style="display: block; font-size: 14px; color: #000000; margin-bottom: 5px;">Material</label>
                    <select name="material_id" id="material_select" required style="width: 100%; border-radius: 6px; padding: 10px; border: 1px solid #66A182;">
                        <option value="" disabled selected>Seleccione material...</option>
                        @foreach($materials as $material)
                            <option value="{{ $material->id }}">{{ $material->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label style="display: block; font-size: 14px; color: #000000 margin-bottom: 5px;">Tipo</label>
                    <select name="type" id="type_select" required style="width: 100%; border-radius: 6px; padding: 10px; border: 1px solid #66A182;">
                        <option value="entrada">Entrada (+)</option>
                        <option value="salida">Salida (-)</option>
                    </select>
                </div>

                <div>
                    <label style="display: block; font-size: 14px; color: #000000; margin-bottom: 5px;">Cantidad</label>
                    <input type="number" name="quantity" id="quantity_input" step="0.01" required style="width: 100%; border-radius: 6px; padding: 10px; border: 1px solid #66A182;">
                </div>
                
                {{-- CORRECCIÓN 2: El botón debe estar fuera de los divs de los inputs para alinearse bien --}}
                <button type="submit" class="btn-atajo btn-entrada" style="height: 42px; margin-top: auto; width: 100%;">Procesar</button>
            </form>
        </div>
    </div>

    <script>
        function prellenarFormulario(materialId, tipo) {
            document.getElementById('material_select').value = materialId;
            document.getElementById('type_select').value = tipo;
            document.getElementById('registro-movimiento').scrollIntoView({ behavior: 'smooth' });
            document.getElementById('quantity_input').focus();
        }
    </script>
</x-warehouse_layout>