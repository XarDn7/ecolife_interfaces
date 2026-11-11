<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\InventoryMovement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Prueba rápida:
    // return "Hola, el controlador funciona perfectamente";
        $materials = Material::all();
        return view('warehouse.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // 1. Validar la entrada
    $request->validate([
        'material_id' => 'required|exists:materials,id',
        'type' => 'required|in:entrada,salida',
        'quantity' => 'required|numeric|min:0.01',
    ]);

    $material = Material::findOrFail($request->material_id);

    // 2. Lógica de Stock
    if ($request->type === 'entrada') {
        $material->stock_actual += $request->quantity;
    } else {
        if ($material->stock_actual < $request->quantity) {
            return back()->with('error', 'No hay suficiente stock de ' . $material->name);
        }
        $material->stock_actual -= $request->quantity;
    }

    $material->save();

    // 3. Registrar el Movimiento (Historial)
    InventoryMovement::create([
        'material_id' => $material->id,
        'user_id' => Auth::id() ?? 1, // Usamos 1 por ahora si no has logueado
        'type' => $request->type,
        'quantity' => $request->quantity,
        'source_destination' => $request->type === 'entrada' ? 'Recolección' : 'Planta de Procesamiento',
    ]);

    return redirect()->route('warehouse.index')->with('success', '¡Movimiento registrado con éxito!');
}
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}