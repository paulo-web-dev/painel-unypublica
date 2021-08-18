<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')
                ->references('id')
                ->on('students');
            $table->unsignedBigInteger('classes_id');
            $table->foreign('classes_id')
                ->references('id')
                ->on('classes');
            $table->float('value')->comment('Valor');
            $table->float('discount')->comment('Desconto');
            $table->float('final_value')->comment('Valor Final');
            $table->enum('status', ['not_checked', 'checked', 'scheduled_billing', 'bill_sent', 'identified_payment', 'commercial_pending', 'financial_pending'])->default('not_checked')->comment('Status da Matrícula');
            $table->string('payment_method')->comment('Forma de Pagamento');
            $table->date('start_date')->nullable()->comment('Início da Vigência');
            $table->date('end_date')->nullable()->comment('Fim da Vigência');
            $table->date('payday')->nullable()->comment('Data de Pagamento');
            $table->string('invoice')->comment('Nota Fiscal');
            $table->string('payment_slip')->comment('Link do Boleto');
            $table->string('transaction_code')->comment('Código de Transação');
            $table->string('wallet')->comment('Responsável pela Matrícula');
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
        Schema::dropIfExists('enrollments');
    }
}
