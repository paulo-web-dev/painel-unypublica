<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherPanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_panels', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')
            ->references('id')
                ->on('teachers')
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
        Schema::dropIfExists('teacher_panels');
    }
}
