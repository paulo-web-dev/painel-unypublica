<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWorkload extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('classes', function ($table) {
            $table->string('workload')->after('type')->comment('Carga Horária da Turma');
            $table->boolean('live')->after('workload')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classes', function ($table) {
            $table->dropColumn('workload');
            $table->dropColumn('live');
        });
    }
}
