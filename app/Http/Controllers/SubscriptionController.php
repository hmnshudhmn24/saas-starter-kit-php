<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('subscription');
    }

    public function subscribe(Request $request)
    {
        $user = $request->user();

        $paymentMethod = $request->input('paymentMethod');
        $plan = $request->input('plan');

        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);

        $user->newSubscription('default', $plan)->create($paymentMethod);

        return redirect('/dashboard')->with('success', 'Subscription successful!');
    }
}
