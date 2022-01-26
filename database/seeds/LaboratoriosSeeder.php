<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;//IMPORTANTE IMPORTAR, PARA QUE SEJECUTE LOS SEEDERS

class LaboratoriosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas

    	DB::table('laboratorios')->truncate();//VACIAR LA TABLA ANTES DE EJECUTAR EL SEEDER
    	
    	DB::table('laboratorios')->insert([
            'nombre'=>'Sala Mac', 'actividad'=>'Dar a clases a los alumnos', 'descripcion'=>'Aula con computadoras Macs, sillas blancas, etc.', 'category_id' =>1
        ]);
        DB::table('laboratorios')->insert([
            'nombre'=>'Sala Mac', 'actividad'=>'Dar a clases a los alumnos', 'descripcion'=>'Aula con computadoras Macs, sillas blancas, etc.', 'category_id' =>1
        ]);
        DB::table('laboratorios')->insert([
            'nombre'=>'Sala Mac', 'actividad'=>'Dar a clases a los alumnos', 'descripcion'=>'Aula con computadoras Macs, sillas blancas, etc.', 'category_id' =>1
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
    }
}
