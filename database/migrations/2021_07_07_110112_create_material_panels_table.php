<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialPanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_panels', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('material_id');
            $table->foreign('material_id')
            ->references('id')
                ->on('materials')
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
        Schema::dropIfExists('material_panels');
    }
}
