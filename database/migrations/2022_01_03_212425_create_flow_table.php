<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flow', function (Blueprint $table) {
            $table->id('id');
            $table->string('mes');
            $table->string('ano');
            $table->integer('numeroAlunos');
            $table->integer('valorCurso');
            $table->integer('desconto');
            $table->integer('valorFinal');
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
        Schema::dropIfExists('flow');
    }
}
