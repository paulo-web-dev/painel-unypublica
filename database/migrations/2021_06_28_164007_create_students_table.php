<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nome do Aluno');
            $table->string('cpf')->unique()->comment('CPF do Aluno');
            $table->string('email')->comment('Email do Aluno');
            $table->string('phone')->comment('Celular do Aluno');
            $table->string('cep')->comment('Cep da rua do Aluno');
            $table->string('street')->comment('Rua do Aluno');
            $table->string('house_number')->comment('Numero da casa do Aluno');
            $table->string('district')->comment('Bairro do Aluno');
            $table->string('city')->comment('Cidade do Aluno');
            $table->string('state', 2)->comment('Estado do Aluno');
            $table->string('photo')->nullable()->comment('Foto do Aluno');
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
        Schema::dropIfExists('students');
    }
}
