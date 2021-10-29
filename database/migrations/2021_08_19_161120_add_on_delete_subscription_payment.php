<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOnDeleteSubscriptionPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscription_payments', function (Blueprint $table) {
            $table->dropForeign(['subscription_id']);
            $table->foreign('subscription_id')
                ->references('id')
                ->on('subscriptions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscription_payments', function (Blueprint $table) {
            $table->dropForeign(['subscription_id']);
            $table->foreign('subscription_id')
                ->references('id')
                ->on('subscriptions');
        });
    }
}
