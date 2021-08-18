<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nome do Professor');
            $table->string('cpf')->unique()->comment('CPF do Professor');
            $table->string('email')->comment('Email do Professor');
            $table->string('phone')->comment('Celular do Professor');
            $table->string('photo')->nullable()->comment('Foto do Professor');
            $table->longText('short_resume')->comment('Breve Currículo');
            $table->longText('full_resume')->comment('Currículo Completo');
            $table->enum('status', ['able', 'disabled'])->default('disabled')->comment('Status do Aluno');
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
        Schema::dropIfExists('teachers');
    }
}
