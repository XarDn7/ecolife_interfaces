<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material;
class MaterialSeeder extends Seeder
{
        public function run(): void
        {
            $materiales = [
                ['name' => 'Plástico PET', 'unit' => 'kg', 'description' => 'Botellas transparentes'],
                ['name' => 'Cartón Corrugado', 'unit' => 'kg', 'description' => 'Cajas de embalaje'],
                ['name' => 'Vidrio Ambar', 'unit' => 'unidades', 'description' => 'Envases retornables'],
                ['name' => 'Aluminio', 'unit' => 'kg', 'description' => 'Latas de refresco'],
                ['name' => 'Papel de Oficina', 'unit' => 'kg', 'description' => 'Hojas blancas recicladas'],
                ];
            foreach ($materiales as $mat) {
                Material::create($mat);
                }
        }
}
