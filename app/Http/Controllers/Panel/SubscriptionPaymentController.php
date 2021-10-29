<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPayment;
use App\Models\Subscription;
use App\Models\Student;
use Illuminate\Http\Request;

class SubscriptionPaymentController extends Controller
{

    public function formParcela(Subscription $subscription)
    {
        $student = Student::where('id', $subscription->student_id)->first();
        return view('painel.form-subscription_payment', [
            'page_name' => 'Painel Unyflex - Adicionar Parcela',
            'subscription' => $subscription,
            'student' => $student
        ]);
    }

    public function infoParcela(SubscriptionPayment $subscriptionPayment)
    {
        $subscriptionPayment = SubscriptionPayment::where('id', $subscriptionPayment->id)->with('subscription')->first();
        $student = Student::where('id', $subscriptionPayment->subscription->student_id)->first();

        return view('painel.subscription_payment-info', [
            'page_name' => 'Painel Unyflex - Informações da Parcela',
            'subscriptionPayment' => $subscriptionPayment,
            'student' => $student
        ]);
    }

    public function cadParcela(Request $request)
    {
        $subscriptionPayment = new SubscriptionPayment();

        $subscriptionPayment->subscription_id = $request->idAssinatura;
        $subscriptionPayment->monthly_value = $request->valorParcela;
        $subscriptionPayment->due_date = $request->dataVencimento;
        $subscriptionPayment->amount_paid = $request->valorPago;
        $subscriptionPayment->payday = $request->dataPagamento;
        $subscriptionPayment->payment_slip = $request->linkPagamento;
        $subscriptionPayment->transaction_code = $request->codigoTransacao;
        $subscriptionPayment->status = $request->status;

        if ($subscriptionPayment->save()) {
            return redirect()->route('informacao-assinatura', ['subscription' => $subscriptionPayment->subscription_id])->with('message', 'subscriptionPayment_created');
        } else {
            return redirect()->route('informacao-parcela', ['subscriptionPayment' => $subscriptionPayment->id])->with('message', 'subscriptionPayment_created_error');
        }
    }

    public function updParcela(SubscriptionPayment $subscriptionPayment, Request $request)
    {
        $subscriptionPayment->monthly_value = $request->valorParcela;
        $subscriptionPayment->due_date = $request->dataVencimento;
        $subscriptionPayment->amount_paid = $request->valorPago;
        $subscriptionPayment->payday = $request->dataPagamento;
        $subscriptionPayment->payment_slip = $request->linkPagamento;
        $subscriptionPayment->transaction_code = $request->codigoTransacao;
        $subscriptionPayment->status = $request->status;

        if ($subscriptionPayment->save()) {
            return redirect()->route('informacao-parcela', ['subscriptionPayment' => $subscriptionPayment->id])->with('message', 'subscriptionPayment_updated');
        } else {
            return redirect()->route('informacao-parcela', ['subscriptionPayment' => $subscriptionPayment->id])->with('message', 'subscriptionPayment_update_error');
        }
    }

    public function destroyParcela(SubscriptionPayment $subscriptionPayment)
    {
        $subscription = $subscriptionPayment->subscription_id;

        if ($subscriptionPayment->delete()) {
            return redirect()->route('informacao-assinatura', ['subscription' => $subscription])->with('message', 'subscriptionPayment_deleted');
        } else {
            return redirect()->route('informacao-parcela', ['subscriptionPayment' => $subscriptionPayment->id])->with('message', 'subscriptionPayment_delete_error');
        }
    }
}
