<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classes_id');
            $table->foreign('classes_id')
            ->references('id')
            ->on('classes');
            $table->string('title')->comment('Título');
            $table->string('subtitle')->comment('Subtítulo');
            $table->longText('content')->nullable()->comment('Programação');
            $table->dateTime('start_time')->comment('Data e hora de Início');
            $table->dateTime('end_time')->comment('Data e hora de Termino');
            $table->enum('status', ['able', 'disabled'])->default('disabled')->comment('Status do Painel');
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
        Schema::dropIfExists('panels');
    }
}
