<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')
                ->references('id')
                ->on('courses');
            $table->string('title')->comment('Título da Turma');
            $table->string('subtitle')->comment('Subtítulo da Turma');
            $table->date('start_date')->comment('Data de início');
            $table->date('end_date')->comment('Data de Término');
            $table->string('type')->comment('Tipo da Turma');
            $table->enum('status', ['able', 'disabled'])->default('disabled')->comment('Status da Turma');
            $table->boolean('confirmed')->default(false);
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
        Schema::dropIfExists('classes');
    }
}
