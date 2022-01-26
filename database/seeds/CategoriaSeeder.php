<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas

    	DB::table('categorias')->truncate();//VACIAR LA TABLA ANTES DE EJECUTAR EL SEEDER

    	DB::table('categorias')->insert([
            'nombre'=>'Tecnologias de la Informacion'
        ]);
        DB::table('categorias')->insert([
            'nombre'=>'Administracion'
        ]);
        DB::table('categorias')->insert([
            'nombre'=>'Turismo'
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
    }
}
