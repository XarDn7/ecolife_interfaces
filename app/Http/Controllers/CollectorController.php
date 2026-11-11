<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material; 
use App\Models\InventoryMovement;

class CollectorController extends Controller
{

public function index()
{
    $materials = Material::all();
    
    // Cambiado a arreglos puros para que coincida con tu $ticket['lugar']
    $tickets = [
        [
            'id' => 1,
            'lugar' => 'Sede Altamira (Punto Fijo)',
            'direccion' => 'Av. Francisco de Miranda, Frente a la Plaza',
            'material_estimado' => 'Plástico PET y Cartón',
            'estado' => 'Pendiente'
        ],
        [
            'id' => 2,
            'lugar' => 'Residencias El Ávila',
            'direccion' => 'Calle Los Cortijos, Edificio 3, Conserjería',
            'material_estimado' => 'Vidrio Ámbar',
            'estado' => 'Pendiente'
        ]
    ];

    return view('collector.index', compact('materials', 'tickets'));
}

    /**
     * Procesa el cierre de un punto de recolección e ingresa el material al inventario.
     */
    public function closeTicket(Request $request)
    {
        $request->validate([
            'ticket_id'          => 'required|integer', 
            'material_id'        => 'required|exists:materials,id', 
            'quantity'           => 'required|numeric|min:0.01', 
            'source_destination' => 'required|string|max:255', 
        ]);

        InventoryMovement::create([
            'material_id'        => $request->material_id,
            'user_id'            => auth()->id() ?? 1, 
            'type'               => 'entrada', 
            'quantity'           => $request->quantity,
            'source_destination' => $request->source_destination, 
        ]);

        return redirect()->route('collector.index')->with('success', "¡Ticket de {$request->source_destination} cerrado con éxito! El material va en tránsito.");
    }
}