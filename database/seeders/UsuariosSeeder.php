<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\CajaSemanal;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Mario',
            'apellido'=>'Cotave',
            'email'=>'maritojhefi@gmail.com',
            'password'=>'jhefi123',
            'foto'=>'',
            'ci'=>'10657721',
            'telf'=>'75140175',
            'direccion'=>'tomatitas',
            'estado_id'=>1,
            'role_id'=>1
        ]);

        User::create([
            'name'=>'Rodrick',
            'apellido'=>'Villa',
            'email'=>'villaortiz110@gmail.com',
            'password'=>'12345',
            'foto'=>'',
            'ci'=>'10655055',
            'telf'=>'75141260',
            'direccion'=>'el campo',
            'estado_id'=>1,
            'role_id'=>1
        ]);
        User::create([
            'name'=>'Dina',
            'apellido'=>'Arostegui',
            'email'=>'dina@gmail.com',
            'password'=>'123',
            'foto'=>'',
            'ci'=>'10655035',
            'telf'=>'75142260',
            'direccion'=>'el campo',
            'estado_id'=>1,
            'role_id'=>3
        ]);
        
    }
}
