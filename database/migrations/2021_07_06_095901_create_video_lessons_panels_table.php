<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoLessonsPanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_lessons_panels', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('video_lesson_id');
            $table->foreign('video_lesson_id')
            ->references('id')
                ->on('video_lessons')
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
        Schema::dropIfExists('video_lessons_panels');
    }
}
