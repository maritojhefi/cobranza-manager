<?php

namespace Database\Seeders;

use App\Models\Abono;
use App\Models\Prestamo;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(EstadosSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UsuariosSeeder::class);
        User::factory(20)->create();
        Prestamo::factory(20)->create();
        Abono::factory(30)->create();
        
    }
}
