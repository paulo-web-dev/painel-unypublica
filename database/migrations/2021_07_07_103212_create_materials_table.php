<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nome do Material');
            $table->string('file_name')->comment('Nome do Arquivo');
            $table->enum('type', ['PDF', 'PowerPoint', 'Excel', 'Word', 'Arquivo Compactado (.RAR)'])->comment('Tipo de Arquivo');
            $table->enum('status', ['able', 'disabled'])->default('disabled')->comment('Status do Material');
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
        Schema::dropIfExists('materials');
    }
}
