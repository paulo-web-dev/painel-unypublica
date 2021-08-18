<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddModality extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enrollments', function ($table) {
            $table->enum('modality', ['distance_learning', 'in_person', 'hybrid'])->default('in_person')->after('classes_id')->comment('Modalidade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enrollments', function ($table) {
            $table->dropColumn('modality');
        });
    }
}
