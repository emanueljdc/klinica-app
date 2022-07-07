<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome',200);
            /*$table->date('data_nascimento')->nullable();
            $table->integer('idade');
            $table->integer('sexo');
            $table->string('endereco',200)->nullable();
            $table->string('bairro',100)->nullable();
            $table->string('telemovel',50)->nullable();
            $table->string('email',100)->unique()->nullable();
            $table->string('nif',20)->unique()->nullable();
            $table->string('bi',10)->unique()->nullable();
            $table->string('passaporte',15)->unique()->nullable();
            $table->string('profissao',200)->nullable();
            $table->string('local_trabalho',50)->nullable();
            $table->string('nome_pai',200)->nullable();
            $table->string('nome_mae',200)->nullable();
            $table->string('nacionalidade',200)->nullable();
            $table->integer('estado');

            $table->bigInteger('ilha_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->foreign('ilha_id')
                ->references('id')
                ->on('ilhas')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');*/

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
