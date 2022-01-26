<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas

    	DB::table('users')->truncate(); //OPCIONAL, SOLO SI SE QUIERE VACIUAR LA TABLA

    	DB::table('users')->insert([
    		'name' => 'Daniel Canul',
    		'email' => 'canul_!2.7474j@gmail.com',
    		'password' => bcrypt('123456')
    	]);
        DB::table('users')->insert([
            'name' => 'Luis Canche',
            'email' => 'luiscanche@gmail.com',
            'password' => bcrypt('contraseñajaja')
        ]);
        DB::table('users')->insert([
            'name' => 'Roberto Carlos',
            'email' => 'carlos1234@gmail.com',
            'password' => bcrypt('contraseñajaja')
        ]);
        DB::table('users')->insert([
            'name' => 'Jesus Perez',
            'email' => 'perezjesus30cm7@gmail.com',
            'password' => bcrypt('contraseñajaja')
        ]);
        DB::table('users')->insert([
            'name' => 'Roman Perera',
            'email' => 'roPere11_83@gmail.com',
            'password' => bcrypt('contraseñajaja')
        ]);
        DB::table('users')->insert([
            'name' => 'Angel Escovar',
            'email' => 'escovar_34_df89@gmail.com',
            'password' => bcrypt('contraseñajaja')
        ]);
        DB::table('users')->insert([
            'name' => '´Pedro Salazar',
            'email' => 'salazar_pedro_45c9@gmail.com',
            'password' => bcrypt('contraseñajaja')
        ]);
        DB::table('users')->insert([
            'name' => 'Jorge Sanzhez',
            'email' => 'sancez.jor.45_F_9@gmail.com',
            'password' => bcrypt('contraseñajaja')
        ]);

         DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
    }
}
