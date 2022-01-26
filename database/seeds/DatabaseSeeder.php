<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //IMPORTANTE:
        //HAY QUE PONER EN ORDEN LOS SEEDER, DE ACUEROD A COMO ESTA EN EL LISTADO, ES DECIR, DE COMO ESTA EN LA CARPETA, DE LO CONTRARIO MARCARA UN ERROR DE QUE NO EXISTE LA CLASE, EL SEEDER
        $this->call(CategoriaSeeder::class);
        $this->call(LaboratoriosSeeder::class);
        $this->call(RoleSeeder::class);//REGISTRANDO EL SEEDER
        $this->call(UsuarioSeeder::class);
    }
}
