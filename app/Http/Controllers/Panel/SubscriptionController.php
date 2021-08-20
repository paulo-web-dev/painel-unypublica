<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\SubscriptionPayment;
use App\Models\Student;

class SubscriptionController extends Controller
{

    public function formAssinatura(Student $student)
    {
        return view('painel.form-subscription', [
            'page_name' => 'Painel Unyflex - Adicionar Assinatura',
            'student' => $student
        ]);
    }

    public function infoAssinatura(Subscription $subscription)
    {
        $subscription = Subscription::where('id', $subscription->id)->with('student')->first();
        $subscriptionPayment = SubscriptionPayment::where('subscription_id', $subscription->id)->orderBy('due_date', 'ASC')->get();

        return view('painel.subscription-info', [
            'page_name' => 'Painel Unyflex - Informações da Assinatura',
            'subscription' => $subscription,
            'subscriptionPayment' => $subscriptionPayment
        ]);
    }

    public function cadAssinatura(Request $request)
    {
        $subscription = new Subscription();

        $subscription->student_id = $request->idAluno;
        $subscription->value = $request->valor;
        $subscription->discount = $request->desconto;
        $subscription->final_value = $request->valorFinal;
        $subscription->status = $request->status;
        $subscription->payment_method = $request->metodoPagamento;
        $subscription->start_date = $request->dataInicio;
        $subscription->end_date = $request->dataTermino;
        $subscription->invoice = $request->notaFiscal;
        $subscription->wallet = $request->carteira;
        $subscription->company = $request->unidade;

        if ($subscription->save()) {
            return redirect()->route('informacao-aluno', ['id' => $subscription->student_id])->with('message', 'subscription_created');
        } else {
            return redirect()->route('informacao-aluno', ['id' => $subscription->student_id])->with('message', 'subscription_create_error');
        }
    }

    public function updAssinatura(Subscription $subscription, Request $request)
    {
        $subscription->student_id = $request->idAluno;
        $subscription->value = $request->valor;
        $subscription->discount = $request->desconto;
        $subscription->final_value = $request->valorFinal;
        $subscription->status = $request->status;
        $subscription->payment_method = $request->metodoPagamento;
        $subscription->start_date = $request->dataInicio;
        $subscription->end_date = $request->dataTermino;
        $subscription->invoice = $request->notaFiscal;
        $subscription->wallet = $request->carteira;
        $subscription->company = $request->unidade;

        if ($subscription->save()) {
            return redirect()->route('informacao-assinatura', ['subscription' => $subscription->id])->with('message', 'subscription_updated');
        } else {
            return redirect()->route('informacao-assinatura', ['subscription' => $subscription->id])->with('message', 'subscription_update_error');
        }
    }

    public function parcelarAssinatura(Subscription $subscription, Request $request)
    {

        $subscriptionPayment = SubscriptionPayment::where('subscription_id', $subscription->id)->get();
        foreach ($subscriptionPayment as $parcela) {
            $parcela->delete();
        }

        $dataInicioParcelamento = $request->data['dataInicioParcelamento'];
        $dataInicioParcelamento = explode('-', $dataInicioParcelamento);

        $anoInicio = $dataInicioParcelamento[0];
        $mesInicio = $dataInicioParcelamento[1];
        $diaInicio = $dataInicioParcelamento[2];

        $numParcelas = $request->data['numparcelas'];
        $valorTotal = $subscription->final_value;

        $valorMensal = $valorTotal / $numParcelas;
        $valorMensal = number_format($valorMensal, 2);

        $datasPagamento = array();

        for ($i = 1; $i <= $numParcelas; $i++) {
            $dadosMes = array();
            $mesInicio = str_pad($mesInicio, 2, '0', STR_PAD_LEFT);
            if ($i > 1) {
                if ($diaInicio >= '25') {
                    $diaInicio = '25';
                }
            }
            if ($mesInicio > 12) {
                $mesInicio = '01';
                $anoInicio++;
            }
            $dataPagamento = $anoInicio . '-' . $mesInicio . '-' . $diaInicio;
            $dadosMes['dataVencimento'] = $dataPagamento;
            $dadosMes['valor'] = $valorMensal;
            $dadosMes['status'] = 'payable';

            $subscriptionPayment = new SubscriptionPayment();
            $subscriptionPayment->subscription_id = $subscription->id;
            $subscriptionPayment->monthly_value = $dadosMes['valor'];
            $subscriptionPayment->due_date = $dadosMes['dataVencimento'];
            $subscriptionPayment->status = $dadosMes['status'];
            $subscriptionPayment->save();
            $dadosMes['id'] = $subscriptionPayment->id;

            array_push($datasPagamento, $dadosMes);
            $mesInicio++;
        }
        if ($subscriptionPayment->save()) {
            return $datasPagamento;
        } else {
            return 'Não foi possível criar o parcelamento';
        }
    }

    public function destroyAssinatura(Subscription $subscription)
    {
        $student = $subscription->student_id;
        if ($subscription->delete()) {
            return redirect()->route('informacao-aluno', ['id' => $student])->with('message', 'subscription_deleted');
        } else {
            return redirect()->route('informacao-assinatura', ['subscription' => $subscription->id])->with('message', 'subscription_delete_error');
        }
    }
}
