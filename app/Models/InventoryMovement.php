<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\InventoryMovement;
class InventoryMovement extends Model
{
    protected $fillable = [
        'material_id',
        'user_id',
        'type',
        'quantity',
        'source_destination'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}