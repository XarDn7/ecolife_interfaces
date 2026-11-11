<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['name', 'unit']; // O los campos que tengas en tu modelo Material

    // AQUÍ ES DONDE VAN:
    // Relación: Un material tiene muchos movimientos de inventario
    public function movements()
    {
        return $this->hasMany(InventoryMovement::class);
    }

    /**
     * Accesador para obtener el stock neto calculado en tiempo real.
     */
    public function getCurrentStockAttribute()
    {
        $entries = $this->movements()->where('type', 'Entrada')->sum('quantity');
        $exits = $this->movements()->where('type', 'Salida')->sum('quantity');
        
        return $entries - $exits;
    }
}