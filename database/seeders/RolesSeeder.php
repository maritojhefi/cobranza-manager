<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array=[Role::ROL1,Role::ROL2,Role::ROL3,Role::ROL4];
        foreach($array as $rol)
        {
            Role::create([
                'nombre_rol'=> $rol
            ]);
        }
        
    }
}
