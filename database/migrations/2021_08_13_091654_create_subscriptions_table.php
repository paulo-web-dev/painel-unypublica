<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')
                ->references('id')
                ->on('students');
            $table->float('value')->comment('Valor');
            $table->float('discount')->comment('Desconto');
            $table->float('final_value')->comment('Valor Final');
            $table->enum('status', ['not_checked', 'checked', 'scheduled_billing', 'bill_sent', 'identified_payment', 'commercial_pending', 'financial_pending'])->default('not_checked')->comment('Status da Assinatura');
            $table->string('payment_method')->comment('Forma de Pagamento');
            $table->date('start_date')->nullable()->comment('Início da Vigência');
            $table->date('end_date')->nullable()->comment('Fim da Vigência');
            $table->string('invoice')->comment('Nota Fiscal');
            $table->string('wallet')->comment('Responsável pela Assinatura');
            $table->string('company')->comment('Matriz ou Filial');
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
        Schema::dropIfExists('subscriptions');
    }
}
