<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Basket;
use App\Models\Colour;
use App\Models\Order;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;

class CheckoutForProductController extends Controller
{
    public function stripeCheckout(Request $request){

        $request->validate([
            'payment_method_id' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255'
        ]);

        \Stripe\Stripe::setApiKey("sk_test_51M8eBoEpf7ECBDDvZ4iCutnq5qeV1MtGhjgHWVaLcR1OYCuaiAUrtLjJzMaZgqyKiXQyG5AxPvWSzqzbNaUNAA2P00YVY16gAK");


        $intent = null;
        try {
            if($request->payment_method_id){
                $intent = \Stripe\PaymentIntent::create([
                    'payment_method' => $request->payment_method_id,
                    'amount' => Basket::Amount(),
                    'currency' => 'gbp',
                    'confirmation_method' => 'manual',
                    'confirm' => true,
                ]);
            }
           
           
        }catch(\Stripe\Exception\ApiErrorException $e){

        echo json_encode([
        'error' => $e->getMessage()
        ]);
    }

    $order = Order::create([
        'user_id' => auth()->id(),
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'country' => $request->country,
        'stripe_id' => $request->payment_intent_id,
        'status' => 'pending',
        'total' => Basket::Amount()
    ]);

    foreach(session()->get('basket') as $item){
        $order->items()->create([
            'product_id' => $item['product']['id'],
            'colour_id' => $item['colour']['id'],
            'quantity' => $item['quantity']
        ]);
    }

    session()->forget('basket');

    return view('pages.orderSuccess', ['order' => $order]);
}
}

