<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscription_id');
            $table->foreign('subscription_id')
                ->references('id')
                ->on('subscriptions');
            $table->decimal('monthly_value', $precision = 8, $scale = 2)->comment('Valor da Mensalidade');
            $table->date('due_date')->nullable()->comment('Data de Vencimento');
            $table->decimal('amount_paid', $precision = 8, $scale = 2)->nullable()->comment('Valor Pago');
            $table->date('payday')->nullable()->comment('Data de Pagamento');
            $table->string('payment_slip')->nullable()->comment('Link do Boleto');
            $table->string('transaction_code')->nullable()->comment('Código de Transação');
            $table->enum('status', ['expired', 'payable', 'paid'])->default('payable')->comment('Status do Pagamento');
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
        Schema::dropIfExists('subscription_payments');
    }
}
