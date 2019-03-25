<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Cart;
use Mail;
use Stripe\Stripe;
use Stripe\Charge;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
     

    }
    public function pay()
    {
       Stripe::setApiKey("sk_test_QhTRlqbeUwY3uqMWCCO6h0uh00ZKhF6I4G"); 

       $charge = Charge::create([

        'amount' => Cart::total() * 100,

        'currency' => 'usd',

        'description' => 'Mr.Shoppy Payments',
        'source'  => request()->stripeToken


       ]);

       Session::flash('success', 'Payment has been successful,Wait for our mail confirmation.');

       Cart::destroy();


       return redirect()->route('cart.checkout');

    }


}
