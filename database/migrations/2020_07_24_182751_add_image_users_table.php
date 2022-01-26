<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //CON ESTO SE PUEDE AGREGAR UNA COLUMANA A LA TABLA DE USUARIOS, EN ESTE CASO EL DE IMAGEN
        Schema::table('users', function (Blueprint $table){
            $table->string('imagen')
                ->after('email_verified_at')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
