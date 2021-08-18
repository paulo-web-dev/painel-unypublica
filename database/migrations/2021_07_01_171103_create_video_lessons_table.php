<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_lessons', function (Blueprint $table) {
            $table->id();
            $table->string('link')->comment('Link da Videoaula');
            $table->string('tasting_link')->comment('Link de Degustação');
            $table->enum('source', ['youtube', 'vimeo'])->default('youtube')->comment('Servidor de Origem');
            $table->longText('subtitle')->nullable()->comment('Legenda da videoaula');
            $table->enum('status', ['able', 'disabled'])->default('disabled')->comment('Status da Videoaula');
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
        Schema::dropIfExists('video_lessons');
    }
}
