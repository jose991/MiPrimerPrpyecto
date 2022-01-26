<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;//IMPORTANTE IMPORTAR, PARA QUE SEJECUTE LOS SEEDERS

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas

    	DB::table('roles')->truncate();//VACIAR LA TABLA ANTES DE EJECUTAR EL SEEDER

        DB::table('roles')->insert([
            'name' => 'alumno',
        ]);

        DB::table('roles')->insert([
            'name' => 'administrador'
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
    }
}
