<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',200);

            $table->bigInteger('user_id')->unsigned();
           
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            
            $table->bigInteger('especialidade_id')->unsigned();
           
            $table->foreign('especialidade_id')
                ->references('id')
                ->on('especialidades')
                ->onDelete('cascade');
    
            $table->bigInteger('nacionalidade_id')->unsigned();
           
            $table->foreign('nacionalidade_id')
                ->references('id')
                ->on('nacionalidades')
                ->onDelete('cascade');

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
        Schema::dropIfExists('medicos');
    }
}
