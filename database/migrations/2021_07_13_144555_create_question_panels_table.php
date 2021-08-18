<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionPanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_panels', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')
            ->references('id')
                ->on('questions')
                ->onDelete('CASCADE');

            $table->unsignedBigInteger('panel_id');
            $table->foreign('panel_id')
                ->references('id')
                ->on('panels')
                ->onDelete('CASCADE');


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
        Schema::dropIfExists('question_panels');
    }
}
