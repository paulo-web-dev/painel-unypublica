<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')
            ->references('id')
                ->on('questions')
                ->onDelete('CASCADE');
            $table->longText('text')->comment('Texto da Alternativa');
            $table->boolean('correct')->default(0)->comment('Alternativa correta?');
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
        Schema::dropIfExists('alternatives');
    }
}
