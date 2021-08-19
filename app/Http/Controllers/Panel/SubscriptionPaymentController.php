<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPayment;
use Illuminate\Http\Request;

class SubscriptionPaymentController extends Controller
{
    public function infoParcela(SubscriptionPayment $subscriptionPayment)
    {
        $subscriptionPayment = SubscriptionPayment::where('id', $subscriptionPayment->id)->with('subscription')->first();

        return view('painel.subscription_payment-info', [
            'page_name' => 'Painel Unyflex - Informações da Parcela',
            'subscriptionPayment' => $subscriptionPayment
        ]);
    }
}
