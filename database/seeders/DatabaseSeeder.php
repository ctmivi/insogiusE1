<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\compras::factory(10)->create();
        \App\Models\detalle_compra::factory(10)->create();
        \App\Models\perfiles::factory(10)->create();
        \App\Models\PerfilxPermiso::factory(10)->create();
        \App\Models\permisos::factory(2)->create();
        \App\Models\productos::factory(10)->create();
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
